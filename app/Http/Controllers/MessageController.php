<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use TCG\Voyager\Http\Controllers\VoyagerController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.user');


    }

    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            return view('voyager::index');
        }
        return redirect()->route('voyager.appeals.index');
    }

    public function showChat(Message $message)
    {

        if ($message->user_id != Auth::user()->id && Auth::user()->hasRole("user")) {
            return back();
        }

        $finishTime = Carbon::now();
        $conversations = Message::where('message_id', $message->id);
        $con = $conversations->orderBy("created_at", 'DESC');

        if (($con->first() !== null)) {
            $starttime = $con->first()->created_at;
        } else $starttime = new Carbon(($starttime = $message->created_at));
        // $carbon = new Carbon(new \DateTime($appeal->created_at), new \DateTimeZone('Asia/Tashkent')); // equivalent to previous instance
        // You can create Carbon or CarbonImmutable instance from:
        $totalDuration = $finishTime->diffInHours($starttime);

        $conversations = Message::where('message_id', $message->id)->orderBy('created_at', 'ASC')->get();
        // dd($totalDuration);
        $user = (User::where('id', $message->user_id)->first()) !== null ? User::where('id', $message->user_id)->first()->name : 'Deleted user';

        return view('chat.chat', compact('conversations', 'user', 'finishTime', 'totalDuration','message'));
    }

    public function send($message, Request $request)
    {

        $con = new Message();
        $con->user_id = $request->user()->id;
        $con->text = $request->text;
        $con->message_id = $message;
        $request->user()->role == 'user' ? $con->is_answer = 0 : $con->is_answer = 1;
        $con->save();
        $message = Message::where('id', $message)->first();
        Auth::user()->hasRole('user') ? $message->update(["status" => 1]) : $message->update(["status" => 2]);

        return redirect()->route('conversation.index', $message);
    }

    public function close($message)
    {


        if (Message::where('id', $message)->update(["status" => 3])) {
            return back()->with('success', 'Closed');
        }
        return back()->with('warning', 'something went wrong!');
    }

    public function showAppeal()
    {
        if (Auth::user()->hasRole('user')) {
            $messages = Message::where('user_id', Auth::user()->id)->orderBy('created_at', 'ASC');
        } else {
            $messages = Message::orderBy('id', 'ASC');
        }
        $messages = $messages->get();
        return view('chat.chat')->with('messages', $messages);
    }


//    public function rating($appeal, Request $request)
//    {
//        $finishTime = now();
//        $appealData = User::where('id', Auth::user()->id);
//        $conversationObject = Conversation::orderBy("created_at", 'DESC');
//        if (($conversationObject->first() !== null)) {
//            $starttime = $conversationObject->first()->created_at;
//        } else $starttime = $appealData->first()->created_at;
//
//        $totalDuration = $finishTime->diffInHours($starttime);
//        $experts = DB::select('SELECT user_id FROM conversations WHERE appeal_id =277 AND user_id IN (SELECT id FROM users WHERE role_id != 2) ORDER BY created_at ASC LIMIT 1');
//        // if ($totalDuration == 48) {
//        //     // Alert::error('impossible close', 'You couldn`t close conversation!!!');
//        //     redirect()->route('voyager.appeals.index')->with('warning', 'something went wrong!');
//        // } else {
//        foreach ($experts as $expert) {
//            // dd($expert->user_id);
//            $userObeject = User::where('id', $expert->user_id);
//            $rating = floatval((floatval($userObeject->first()->rating) + floatval($request->rating)) / 2);
//            $expertUser = $userObeject->update(['rating' => $rating]);
//        }
//
//
//        if (Appeal::where('id', $appeal)->update(["status" => 3])) {
//            Alert::success('Closed', 'Conversation closed succesfully!');
//            return redirect()->route('voyager.appeals.index')->with('success', 'Closed');
//        } else {
//            Alert::error('impossible close', 'You couldn`t close conversation!!!');
//            return redirect()->route('voyager.appeals.index')->with('warning', 'something went wrong!');
//        }
//    }

    // }
//    public function setLang(Request $request)
//    {
//
//        $user = User::where('id', Auth::user()->id)->update(["settings" => ["locale" => $request->lang]]);
//        $x = App::setLocale($request->lang);
//
//        return back();
//    }
}
