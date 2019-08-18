<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Channel;

class ForumsController extends Controller
{
    public function index(){

        $discussion = Discussion::orderBy('created_at', 'desc')->paginate(3);
        return view('forum', ['discussion' => $discussion]);
    }


    public function channel($slug){
        $channel = Channel::where('slug', $slug)->first();

        return view('channel')->with('discussion', $channel->discussions()->paginate(5));
    }
}
