<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Request as ModelsRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRequestController extends Controller
{
    //

    public function user_message(){
        $messages=Message::latest()->paginate(5);
        return view('dashboard.user_request.user_message',compact('messages'));
    }


    public function blogger_request(){
        $requests= ModelsRequest::latest()->paginate(4);
        return view('dashboard.user_request.blogger_request',compact('requests'));
    }


    public function blogger_request_accept($id){
        $requests=ModelsRequest::where('id',$id)->first();

        User::find($requests->user_id)->update([
            'role'=>'blogger',
            'updated_at'=>now()
        ]);

        ModelsRequest::find($id)->delete();
        return back()->with('success','Request Accept Successfully!');

    }


    public function blogger_request_cancel($id){

        ModelsRequest::find($id)->delete();
        return back()->with('success','Request Cancel Successfully!');

    }


    public function blogger_request_send(Request $request,$id){
        $request->validate([
            'feedback'=>'required'
        ]);

        ModelsRequest::create([
            'user_id'=> $id,
            'feedback'=>$request->feedback,
            'created_at'=>now()
        ]);

        return back()->with('success','Your Request Send Successfully!');

    }
}
