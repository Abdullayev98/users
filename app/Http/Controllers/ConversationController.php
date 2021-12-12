<?php

namespace App\Http\Controllers;

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

class ConversationController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.user');

        // return back();
    }
    public function index(){
        if(Auth::user()->hasRole('admin')){
            return view('voyager::index');
        }
        return redirect()->route('voyager.appeals.index');
    }
    public function toExpert($message)
    {

//        $messageObject = Appeal::where('id', $message);
//        $messageData = $messageObject->first();
//        $files = json_decode($messageData->images);
//
//        $details = [
//            'title' => $messageData->title,
//            'body' => $messageData->text,
//            'files' => $files
//        ];
//        if(Mail::to(Auth::user()->email)->send(new SendMail($details))){
//            Alert::success('Send', 'Appeal sent to expert');
//        };
//        return redirect()->route('voyager.appeals.index');
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
        return view('Chat.chat', compact('conversations', 'message', 'user', 'finishTime', 'totalDuration'));
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
            $message = Message::where('user_id', Auth::user()->id)->orderBy('created_at', 'ASC');
        } else {
            $message = Message::orderBy('id', 'ASC');
        }
        $messages = $message->get();
        return view('appeal.appeals')->with('appeals', $messages);
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
            return redirect()->route('voyager.appeals.index')->with('success', 'Closed');
        } else {
            Alert::error('impossible close', 'You couldn`t close conversation!!!');
            return redirect()->route('voyager.appeals.index')->with('warning', 'something went wrong!');
        }
    }
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
