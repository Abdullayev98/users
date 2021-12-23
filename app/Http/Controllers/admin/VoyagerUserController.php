<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerUserController as BaseVoyagerUserController;
use TCG\Voyager\Models\DataRow;

class VoyagerUserController extends BaseVoyagerUserController
{
    public function store(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));
        if (
            User::query()->where("email", $request->email)->first() &&
            User::query()->where("email", $request->email)->first()->id != auth()->user()->id
        ) {
            return back()
                ->with([
                    'message' => "Kiritilgan email : $request->email boshqa foydalanuvchida mavjud",
                    'error'
                ]);
        }

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows)->validate();
        $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());

        event(new BreadDataAdded($dataType, $data));

        if (!$request->has('_tagging')) {
            if (auth()->user()->can('browse', $data)) {
                $redirect = redirect()->route("voyager.{$dataType->slug}.index");
            } else {
                $redirect = redirect()->back();
            }

            return $redirect->with([
                'message'    => __('voyager::generic.successfully_added_new')." {$dataType->getTranslatedAttribute('display_name_singular')}",
                'alert-type' => 'success',
            ]);
        } else {
            return response()->json(['success' => true, 'data' => $data]);
        }
    }
    //
    public function update(Request $request, $id)
    {
        if (Auth::user()->getKey() == $id) {
            $request->merge([
                'role_id'                              => Auth::user()->role_id,
                'is_active'                              => 1,
                'user_belongstomany_role_relationship' => Auth::user()->roles->pluck('id')->toArray(),
            ]);
        }

        return parent::update($request, $id);
    }

    public function activity(User $user) {
        if (!auth()->user()->hasPermission("change_activeness")) {
            return back()->with([
                'message' => "Sizga ruxsat etilmagan!",
                'alert-type' => 'error',
            ]);
        }
        $user->is_active = $user->is_active?0:1;
        $user->save();
        return back()->with([
            'message' => "Muvafaqiyatli o'zgartirildi!"
        ]);
    }

    public function bulk_active(Request $request)
    {
        if (!auth()->user()->hasPermission("change_activeness")) {
            return back()->with([
                'message' => "Sizga ruxsat etilmagan!",
                'alert-type' => 'error',
            ]);

        }
        if (!$request->ids){
            return back()->with([
                'message'    => "Hech qanday foydalanuvchi tanlanmadi!",
                'alert-type' => 'error',
            ]);
        }
        $ids = explode(",",$request->ids);
        $i = 0;
        foreach ($ids as $user){
            $user = User::find($user);
            $user->is_active = 1;
            $user->save();
            $i++;
        }
        return back()->with([
            'message'    => $i . " ta foydalanuvchilar muvaffaqiyatli aktivlashtirildi!",
            'alert-type' => 'success',
        ]);
    }
    public function bulk_inactive(Request $request)
    {
        // Do something with the IDs
        if (!auth()->user()->hasPermission("change_activeness")) {
            return back()->with([
                'message' => "Sizga ruxsat etilmagan!",
                'alert-type' => 'error',
            ]);

        }
            if (!$request->ids){
            return back()->with([
                'message'    => "Hech qanday foydalanuvchi tanlanmadi!",
                'alert-type' => 'error',
            ]);
        }

        $ids = explode(",",$request->ids);
        $i = 0;
        foreach ($ids as $user){
            $user = User::find($user);
            $user->is_active = 0;
            $user->save();
            $i++;
        }
        return back()->with([
            'message'    => $i . " ta foydalanuvchilar muvaffaqiyatli noaktivlashtirildi!",
            'alert-type' => 'success',
        ]);
    }

 //    public function users(Request $request)
////    {
////        if (!auth()->user()->hasPermission("browse_admins_menu")){
////           return back()->with([
//                'message'    => "Sizga ruxsat etilmagan!",
//                'alert-type' => 'error',
//            ]);        }
//        $users = User::all();
//
//        $dataType = Voyager::model('DataType')->where('slug', '=', "users")->first();
//
//        $dataTypeContent = $users;
//        $showCheckboxColumn = false;
//        if (Auth::user()->can('delete', app($dataType->model_name))) {
//            $showCheckboxColumn = true;
//        } else {
//            foreach ($actions as $action) {
//                if (method_exists($action, 'massAction')) {
//                    $showCheckboxColumn = true;
//                }
//            }
//        }
//
//        // Actions
//        $actions = [];
//        if (!empty($users->first())) {
//            foreach (Voyager::actions() as $action) {
//                $action = new $action($dataType, $users->first());
//
//                if ($action->shouldActionDisplayOnDataType()) {
//                    $actions[] = $action;
//                }
//            }
//        }
//
//        $is_active = auth()->user()->hasPermission("change_activeness");
//
//        return Voyager::view("admins", compact(
//            'actions',
//            'dataType',
//            'dataTypeContent',
//            'showCheckboxColumn',
//            'is_active',
//            'users'
//        ));
//    }

    public function admins(Request $request)
    {

        // GET THE SLUG, ex. 'posts', 'pages', etc.
        $slug = "users";

        if (!auth()->check() || !auth()->user()->hasPermission("browse_admins_menu")){
            return back()->with([
                'message'    => "Sizga ruxsat etilmagan!",
                'alert-type' => 'error',
            ]);        }
        $users = User::all();

        $dataType = Voyager::model('DataType')->where('slug', '=', "users")->first();


        // GET THE DataType based on the slug
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        $rows = [];
        foreach (DataRow::all() as $item) {
           if (($item->field == "name"||$item->field == "email"||$item->field == "user_belongsto_role_relationship"||$item->field == "created_at")&& $item->data_type_id==1){
               $rows[] = $item;
           }

        }

        // Check permission
        $this->authorize('browse', app($dataType->model_name));

        $getter = $dataType->server_side ? 'paginate' : 'get';

        $search = (object) ['value' => $request->get('s'), 'key' => $request->get('key'), 'filter' => $request->get('filter')];

        $searchNames = [];
        if ($dataType->server_side) {
            $searchNames = $dataType->browseRows->mapWithKeys(function ($row) {
                return [$row['field'] => $row->getTranslatedAttribute('display_name')];
            });
        }

        $orderBy = $request->get('order_by', $dataType->order_column);
        $sortOrder = $request->get('sort_order', $dataType->order_direction);
        $usesSoftDeletes = false;
        $showSoftDeleted = false;

        // Next Get or Paginate the actual content from the MODEL that corresponds to the slug DataType
        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);

            $query = $model::select($dataType->name.'.*');

            if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
                $query->{$dataType->scope}();
            }

            // Use withTrashed() if model uses SoftDeletes and if toggle is selected
            if ($model && in_array(SoftDeletes::class, class_uses_recursive($model)) && Auth::user()->can('delete', app($dataType->model_name))) {
                $usesSoftDeletes = true;

                if ($request->get('showSoftDeleted')) {
                    $showSoftDeleted = true;
                    $query = $query->withTrashed();
                }
            }

            // If a column has a relationship associated with it, we do not want to show that field
            $this->removeRelationshipField($dataType, 'browse');

            if ($search->value != '' && $search->key && $search->filter) {
                $search_filter = ($search->filter == 'equals') ? '=' : 'LIKE';
                $search_value = ($search->filter == 'equals') ? $search->value : '%'.$search->value.'%';

                $searchField = $dataType->name.'.'.$search->key;
                if ($row = $this->findSearchableRelationshipRow($dataType->rows->where('type', 'relationship'), $search->key)) {
                    $query->whereIn(
                        $searchField,
                        $row->details->model::where($row->details->label, $search_filter, $search_value)->pluck('id')->toArray()
                    );
                } else {
                    if ($dataType->browseRows->pluck('field')->contains($search->key)) {
                        $query->where($searchField, $search_filter, $search_value);
                    }
                }
            }

            $row = $dataType->rows->where('field', $orderBy)->firstWhere('type', 'relationship');

            if ($orderBy && (in_array($orderBy, $dataType->fields()) || !empty($row))) {
                $querySortOrder = (!empty($sortOrder)) ? $sortOrder : 'desc';
                if (!empty($row)) {
                    $query->select([
                        $dataType->name.'.*',
                        'joined.'.$row->details->label.' as '.$orderBy,
                    ])->leftJoin(
                        $row->details->table.' as joined',
                        $dataType->name.'.'.$row->details->column,
                        'joined.'.$row->details->key
                    );
                }

                $dataTypeContent = call_user_func([
                    $query->orderBy($orderBy, $querySortOrder),
                    $query>where("role_id",'!=', 9),
                    $getter,
                ]);
            } else {
                $dataTypeContent = call_user_func([$query->orderBy($model->getKeyName(), 'DESC'), $getter]);
            }

            // Replace relationships' keys for labels and create READ links if a slug is provided.
            $dataTypeContent = $this->resolveRelations($dataTypeContent, $dataType);
        } else {
            // If Model doesn't exist, get data from table name
            $dataTypeContent = call_user_func([DB::table($dataType->name), $getter]);
            $model = false;
        }


        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($model);

        // Eagerload Relations
        $this->eagerLoadRelations($dataTypeContent, $dataType, 'browse', $isModelTranslatable);

        // Check if server side pagination is enabled
        $isServerSide = isset($dataType->server_side) && $dataType->server_side;

        // Check if a default search key is set
        $defaultSearchKey = $dataType->default_search_key ?? null;

        // Actions
        $actions = [];
        if (!empty($dataTypeContent->first())) {
            foreach (Voyager::actions() as $action) {
                $action = new $action($dataType, $dataTypeContent->first());

                if ($action->shouldActionDisplayOnDataType()) {
                    $actions[] = $action;
                }
            }
        }

        // Define showCheckboxColumn
        $showCheckboxColumn = false;
        if (Auth::user()->can('delete', app($dataType->model_name))) {
            $showCheckboxColumn = true;
        } else {
            foreach ($actions as $action) {
                if (method_exists($action, 'massAction')) {
                    $showCheckboxColumn = true;
                }
            }
        }

        // Define orderColumn
        $orderColumn = [];

        if ($orderBy) {
            $index = $dataType->browseRows->where('field', $orderBy)->keys()->first() + ($showCheckboxColumn ? 1 : 0);
            $orderColumn = [[$index, $sortOrder ?? 'desc']];
        }

        // Define list of columns that can be sorted server side
        $sortableColumns = $this->getSortableColumns($dataType->browseRows);

        $view = 'voyager::bread.browse';



        if (view()->exists("voyager::$slug.browse")) {
            $view = "voyager::$slug.browse";
        }

        $dataTypeContent = User::query()->where('role_id',"!=", 9)->get();
        return Voyager::view('admins', compact(
            'actions',
            'dataType',
            'dataTypeContent',
            'isModelTranslatable',
            'search',
            'orderBy',
            'orderColumn',
            'sortableColumns',
            'sortOrder',
            'searchNames',
            'isServerSide',
            'defaultSearchKey',
            'usesSoftDeletes',
            'showSoftDeleted',
            'showCheckboxColumn',
            'rows'
        ));
    }

    public function users(Request $request)
    {

        // GET THE SLUG, ex. 'posts', 'pages', etc.
        $slug = "users";

        if (!auth()->check() || !auth()->user()->hasPermission("browse_admins_menu")){
            return back()->with([
                'message'    => "Sizga ruxsat etilmagan!",
                'alert-type' => 'error',
            ]);        }
        $users = User::all();

        $dataType = Voyager::model('DataType')->where('slug', '=', "users")->first();


        // GET THE DataType based on the slug
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();


        // Check permission
        $this->authorize('browse', app($dataType->model_name));

        $getter = $dataType->server_side ? 'paginate' : 'get';

        $search = (object) ['value' => $request->get('s'), 'key' => $request->get('key'), 'filter' => $request->get('filter')];

        $searchNames = [];
        if ($dataType->server_side) {
            $searchNames = $dataType->browseRows->mapWithKeys(function ($row) {
                return [$row['field'] => $row->getTranslatedAttribute('display_name')];
            });
        }

        $orderBy = $request->get('order_by', $dataType->order_column);
        $sortOrder = $request->get('sort_order', $dataType->order_direction);
        $usesSoftDeletes = false;
        $showSoftDeleted = false;

        // Next Get or Paginate the actual content from the MODEL that corresponds to the slug DataType
        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);

            $query = $model::select($dataType->name.'.*');

            if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
                $query->{$dataType->scope}();
            }

            // Use withTrashed() if model uses SoftDeletes and if toggle is selected
            if ($model && in_array(SoftDeletes::class, class_uses_recursive($model)) && Auth::user()->can('delete', app($dataType->model_name))) {
                $usesSoftDeletes = true;

                if ($request->get('showSoftDeleted')) {
                    $showSoftDeleted = true;
                    $query = $query->withTrashed();
                }
            }

            // If a column has a relationship associated with it, we do not want to show that field
            $this->removeRelationshipField($dataType, 'browse');

            if ($search->value != '' && $search->key && $search->filter) {
                $search_filter = ($search->filter == 'equals') ? '=' : 'LIKE';
                $search_value = ($search->filter == 'equals') ? $search->value : '%'.$search->value.'%';

                $searchField = $dataType->name.'.'.$search->key;
                if ($row = $this->findSearchableRelationshipRow($dataType->rows->where('type', 'relationship'), $search->key)) {
                    $query->whereIn(
                        $searchField,
                        $row->details->model::where($row->details->label, $search_filter, $search_value)->pluck('id')->toArray()
                    );
                } else {
                    if ($dataType->browseRows->pluck('field')->contains($search->key)) {
                        $query->where($searchField, $search_filter, $search_value);
                    }
                }
            }

            $row = $dataType->rows->where('field', $orderBy)->firstWhere('type', 'relationship');

            if ($orderBy && (in_array($orderBy, $dataType->fields()) || !empty($row))) {
                $querySortOrder = (!empty($sortOrder)) ? $sortOrder : 'desc';
                if (!empty($row)) {
                    $query->select([
                        $dataType->name.'.*',
                        'joined.'.$row->details->label.' as '.$orderBy,
                    ])->leftJoin(
                        $row->details->table.' as joined',
                        $dataType->name.'.'.$row->details->column,
                        'joined.'.$row->details->key
                    );
                }

                $dataTypeContent = call_user_func([
                    $query->orderBy($orderBy, $querySortOrder),
                    $query>where("role_id",'!=', 9),
                    $getter,
                ]);
            } else {
                $dataTypeContent = call_user_func([$query->orderBy($model->getKeyName(), 'DESC'), $getter]);
            }

            // Replace relationships' keys for labels and create READ links if a slug is provided.
            $dataTypeContent = $this->resolveRelations($dataTypeContent, $dataType);
        } else {
            // If Model doesn't exist, get data from table name
            $dataTypeContent = call_user_func([DB::table($dataType->name), $getter]);
            $model = false;
        }


        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($model);

        // Eagerload Relations
        $this->eagerLoadRelations($dataTypeContent, $dataType, 'browse', $isModelTranslatable);

        // Check if server side pagination is enabled
        $isServerSide = isset($dataType->server_side) && $dataType->server_side;

        // Check if a default search key is set
        $defaultSearchKey = $dataType->default_search_key ?? null;

        // Actions
        $actions = [];
        if (!empty($dataTypeContent->first())) {
            foreach (Voyager::actions() as $action) {
                $action = new $action($dataType, $dataTypeContent->first());

                if ($action->shouldActionDisplayOnDataType()) {
                    $actions[] = $action;
                }
            }
        }

        // Define showCheckboxColumn
        $showCheckboxColumn = false;
        if (Auth::user()->can('delete', app($dataType->model_name))) {
            $showCheckboxColumn = true;
        } else {
            foreach ($actions as $action) {
                if (method_exists($action, 'massAction')) {
                    $showCheckboxColumn = true;
                }
            }
        }

        // Define orderColumn
        $orderColumn = [];

        if ($orderBy) {
            $index = $dataType->browseRows->where('field', $orderBy)->keys()->first() + ($showCheckboxColumn ? 1 : 0);
            $orderColumn = [[$index, $sortOrder ?? 'desc']];
        }

        // Define list of columns that can be sorted server side
        $sortableColumns = $this->getSortableColumns($dataType->browseRows);

        $view = 'voyager::bread.browse';

        if (view()->exists("voyager::$slug.browse")) {
            $view = "voyager::$slug.browse";
        }
        return Voyager::view($view, compact(
            'actions',
            'dataType',
            'dataTypeContent',
            'isModelTranslatable',
            'search',
            'orderBy',
            'orderColumn',
            'sortableColumns',
            'sortOrder',
            'searchNames',
            'isServerSide',
            'defaultSearchKey',
            'usesSoftDeletes',
            'showSoftDeleted',
            'showCheckboxColumn'
        ));
    }


}
