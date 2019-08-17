<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;
use Auth;
use App\Like;
use Session;

class RepliesController extends Controller
{
    public function like($id){

        Like::create([
            'reply_id' => $id,
            'user_id' => Auth::id()
        ]);

        Session::flash('success', 'You likes the reply');

        return redirect()->back();
    }


    public function unlike($id){
        $unlike = Like::where('reply_id', $id)->where('user_id', Auth::id());

        $unlike->delete();

        Session::flash('success', 'You unliked the reply');


        return redirect()->back();
    }
}
