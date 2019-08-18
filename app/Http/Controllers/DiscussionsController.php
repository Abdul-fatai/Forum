<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use App\Discussion;
use App\User;
use App\Reply;
use Notification;

class DiscussionsController extends Controller
{
    public function create(){

        return view('discuss');
    }


    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'channel_id' => 'required',
            'content' => 'required'
        ]);

        $discussion = Discussion::create([
            'title' => $request->title,
            'content' => $request->content,
            'channel_id' => $request->channel_id,
            'user_id' => Auth::id(),
            'slug' => str_slug($request->title)
        ]);

        Session::flash('success', 'Discussion created successfully.');

        return redirect()->route('discussion', ['slug' => $discussion->slug]);
    }


    public function show($slug){

        $discussion = Discussion::where('slug', $slug)->first();
        $best_answer = $discussion->replies()->where('best_answer', 1)->first();
        
        return view('discussions.show')
                                        ->with('d', $discussion)
                                        ->with('best_answer', $best_answer);
        
    }


    public function reply($id){
        $d = Discussion::find($id);

        $reply = Reply::create([
            'user_id' => Auth::id(),
            'discussion_id' => $id,
            'content' => request()->content
        ]);

        $watchers = array();

        foreach($d->watchers as $watcher):
            array_push($watchers, User::find($watcher->user_id));
        endforeach;

        Notification::send($watchers, new \App\Notifications\NewReplyAdded($d));

        Session::flash('success', 'Replied to discussion');

        return redirect()->back();
    }


}
