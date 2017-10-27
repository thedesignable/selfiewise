<?php

namespace App\Http\Controllers;

use Auth;
use Alert;
use App\User;

use Illuminate\Http\Request;

class FriendshipsController extends Controller
{
    //
    public function check($id)
    {
    	if(Auth::user()->is_friends_with($id) === 1)
    		{
    			return ["status" =>  "Friends"];
    		}
    	if(Auth::user()->has_pending_friend_request_from($id))
    		{
    			return ["status" => "pending"];
    		}
		if(Auth::user()->has_pending_request_sent_to($id))
		{
			return ["status" => "Awaiting"];
		}
		return ["status" => 0];
    }



    public function add_friend($id)
    {
    	
    	$resp  =  Auth::user()->add_friend($id);

    	// User::find($id)->notify(new \App\Notifications\NewFriendRequest(Auth::user()) );

    	return $resp;
    }



    public function accept_friend($id)
    {
    	return Auth::user()->accept_friend($id);
    }
}




