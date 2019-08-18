<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Discussion;
use App\Channel;
use Auth;

class ForumsController extends Controller
{
    public function index(){

        // $discussion = Discussion::orderBy('created_at', 'desc')->paginate(3);
        
        switch (request('filter')) {
            case 'me':
                $results = Discussion::where('user_id', Auth::id())->paginate(4);
                break;
            case 'solved':
                $answered = array();

                foreach (Discussion::all() as $d) {

                    if ($d->hasBestAnswer()) {
                        array_push($answered, $d); 
                    }
                }

                $results = new Paginator($answered, 3);

            break;
               
            case 'unsolved':
                $unanswered = array();

                foreach (Discussion::all() as $d) {

                    if (!$d->hasBestAnswer()) {
                        array_push($unanswered, $d); 
                    }
                }

                $results = new Paginator($unanswered, 3);
            break;

            default:
                $results = Discussion::orderBy('created_at', 'desc')->paginate(4);
                break;
        }
        return view('forum', ['discussion' => $results]);
    }


    public function channel($slug){
        $channel = Channel::where('slug', $slug)->first();

        return view('channel')->with('discussion', $channel->discussions()->paginate(5));
    }
}
