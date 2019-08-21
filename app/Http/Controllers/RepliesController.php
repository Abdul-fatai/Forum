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

        Session::flash('success', 'You liked the reply');

        return redirect()->back();
    }


    public function unlike($id){
        $unlike = Like::where('reply_id', $id)->where('user_id', Auth::id());

        $unlike->delete();

        Session::flash('success', 'You unliked the reply');


        return redirect()->back();
    }

    public function best_answer($id){
        $reply = Reply::find($id);

        $reply->best_answer = 1;

        $reply->save();

        $reply->user->points += 100;
        $reply->user->save();

        Session::flash('success', 'Reply marked as best answer.');

        return redirect()->back();
    }

    public function edit($id){
        $reply = Reply::find($id);

        return view('replies.edit')->with('reply', $reply);
    }

    public function update($id){
        $this->validate(request(), [
            'content' => 'required'
        ]);

        $reply = Reply::find($id);

        $reply->content = request()->content;
        $reply->save();

        Session::flash('success', 'Reply updated.');
        return redirect()->route('discussion', ['slug' => $reply->discussion->slug]);
    }
}
