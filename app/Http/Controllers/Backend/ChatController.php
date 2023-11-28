<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatMessage;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ChatController extends Controller
{
    public function SendMsg(Request $request){
        $request->validate([
            'msg' => 'required'
        ]);

        ChatMessage::create([
            'sender_id' => Auth::user()->id,
            'receiver_id' => request()->input('staff_id'), // Use request() to access request data
            'msg' => request()->input('msg'), // Use request() to access request data
            'created_at' => now(), // You can use the now() helper function directly
        ]);
        

        return response()->json(['message' => 'Message Send Successful']);


    } // End Method 


    public function GetAllUsers(){

        $chats = ChatMessage::orderBy('id','DESC')
                ->where('sender_id',auth()->id())
                ->orWhere('receiver_id',auth()->id())
                ->get();

        $users = $chats->flatMap(function($chat){
            if ($chat->sender_id === auth()->id()) {
                return [$chat->sender, $chat->receiver];
            }

            return [$chat->receiver, $chat->sender];
        })->unique();

        return $users;

    } // End Method 


    public function UserMsgById($userId){

        $user = User::find($userId);
        if ($user) {
            $messages = ChatMessage::where(function($q) use ($userId){
                $q->where('sender_id',auth()->id());
                $q->where('receiver_id',$userId); 
                 })->orWhere(function($q) use ($userId){
                 $q->where('sender_id',$userId);
                 $q->where('receiver_id',auth()->id()); 
                 })->with('user')->get();

                 return response()->json([
                    'user' => $user,
                    'messages' => $messages,
                 ]);
        }else{
            abort(404);
        }

    } // End Method

    public function StaffLiveChat(){

        return view('staff.message.live-chat');

    } // End Method



}
 