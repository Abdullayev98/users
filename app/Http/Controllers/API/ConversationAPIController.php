<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;
use TCG\Voyager\Http\Controllers\VoyagerController;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ConversationAPIController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.user');
    }

    public function showChat(User $user, Message $message)
    {

        if( $user->id != Auth::user()->id && Auth::user()->hasRole("user")){
            return back();
        }

        $finishTime = Carbon::now();
        $conversations = Message::where('id', $message->id);
        $con = $conversations->orderBy("created_at", 'DESC');

        if (($con->first() !== null)) {
            $starttime = $con->first()->created_at;
        } else $starttime = new Carbon(($starttime = $message->created_at));
        // $carbon = new Carbon(new \DateTime($message->created_at), new \DateTimeZone('Asia/Tashkent')); // equivalent to previous instance
        // You can create Carbon or CarbonImmutable instance from:
        $totalDuration = $finishTime->diffInHours($starttime);

        $conversations = Message::where('id', $message->id)->orderBy('created_at', 'ASC')->get();
        // dd($totalDuration);
        $user = (User::where('id', $message->user_id)->first()) !== null ? User::where('id', $user->id)->first()->name : 'Deleted user';
        
        return response()->json([
            'success' => true,
            'data' => [
                'conversations' => $conversations,
                'message' => $message,
                'user' => $user,
                'finishTime' => $finishTime,
                'totalDuration' => $totalDuration
            ]
        ]);
    }

    public function send($message, Request $request, User $user)
    {

        $con = new Message();
        $con->user_id = $request->user()->id;
        $con->text = $request->text;
        $con->id = $message;
        $request->user()->role == 'user' ? $con->is_answer = 0 : $con->is_answer = 1;
        $con->save();
        $message = User::where('id', $user->id)->first();
        Auth::user()->hasRole('user') ? $message->update(["status" => 1]) : $message->update(["status" => 2]);

        return response()->json($message);
    }

    public function close($message)
    {
        if (Message::where('id', $message)->update(["status" => 3])) {
            return response()->json([
                'success' => true,
                'message' => 'Closed'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'something went wrong!'
        ]);
    }

    public function rating($message, Request $request)
    {
        $finishTime = now();
        $messageData = User::where('id', Auth::user()->id);
        $conversationObject = Message::orderBy("created_at", 'DESC');
        if (($conversationObject->first() !== null)) {
            $starttime = $conversationObject->first()->created_at;
        } else $starttime = $messageData->first()->created_at;

        $totalDuration = $finishTime->diffInHours($starttime);
        $experts = DB::select('SELECT user_id FROM messages WHERE message_id =null AND user_id IN (SELECT id FROM users WHERE role_id != 2) ORDER BY created_at ASC LIMIT 1');
        // if ($totalDuration == 48) {
        //     // Alert::error('impossible close', 'You couldn`t close conversation!!!');
        //     redirect()->route('voyager.appeals.index')->with('warning', 'something went wrong!');
        // } else {
        foreach ($experts as $expert){
            // dd($expert->user_id);
            $userObeject = User::where('id', $expert->user_id);
            $rating = floatval((floatval($userObeject->first()->rating) + floatval($request->rating))/2);
            $expertUser = $userObeject->update(['rating' => $rating]);
        }


        if (Message::where('id', $message)->update(["status" => 3])) {
            Alert::success('Closed', 'Conversation closed succesfully!');
            return response()->json([
                'success' => true,
                'message' => 'Closed'
            ]);
        } else {
            Alert::error('impossible close', 'You couldn`t close conversation!!!');
            return response()->json([
                'success' => false,
                'message' => 'something went wrong!'
            ]);
        }
    }
}
