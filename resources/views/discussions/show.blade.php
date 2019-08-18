@extends('layouts.app')

@section('content')
    <div class="card mb-4">
            <div class="card-header">
                <img src="{{ $d->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;
                <span>{{ $d->user->name }} <b>( {{ $d->user->points }} )</b></span>
                @if($d->HasBestAnswer())
                    <span class="btn btn-success btn-sm float-right ml-2">closed</span>
                @else
                    <span class="btn btn-danger btn-sm float-right  ml-2">open</span>
                @endif
               
                
                @if($d->is_being_watched_by_auth_user())
                    <a href="{{ route('discussion.unwatch', ['id' => $d->id ]) }}" class="btn btn-primary btn-sm float-right">unwatch</a>
                @else
                    <a href="{{ route('discussion.watch', ['id' => $d->id ]) }}" class="btn btn-primary btn-sm float-right">watch</a>
                @endif
            </div>

            <div class="card-body">
            <h4 class="text-center">
                    {{ $d->title }}
                </h4> 
                <hr>
                <p class="text-center">
                    {{ $d->content }}
                </p>

                <hr>

                @if($best_answer)
                <div class="text-center p-4">
                    <h4>BEST ANSWER</h4>
                    <div class="card ">
                        <div class="card-header bg-success">
                            <img src="{{ $best_answer->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;
                            <span>{{ $best_answer->user->name }} <b>( {{ $best_answer->user->points }} )</b></span>
                        </div>

                        <div class="card-body">
                            {{ $best_answer->content}}
                        </div>
                    </div>
                </div>
                @endif

            </div>

            <div class="card-footer">
                <span>
                    {{ $d->replies->count() }} Replies
                </span>

                <a href="{{ route('channel', ['slug' => $d->channel->slug ]) }}" class="btn btn-primary btn-sm float-right">{{ $d->channel->title}}</a>
            </div>
    </div>

    @foreach($d->replies as $r)
    <div class="card card mb-3">
            <div class="card-header">
                <img src="{{ $r->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;
                <span>{{ $r->user->name }} <b>( {{ $r->user->points }} )</b></span>
                @if(!$best_answer)
                   @if(Auth::id() == $d->user->id)
                      <a href="{{ route('discussion.best.anwser', ['id' => $r->id ])}}" class="btn btn-info btn-sm float-right">Mark as best answer</a>
                   @endif
                @endif
            </div>

            <div class="card-body">
                <p class="text-center">
                    {{ $r->content }}
                </p>
            </div>

            <div class="card-footer">
                @if($r->is_liked_by_auth_user())
                    <a href="{{ route('reply.unlike', ['id' => $r->id ]) }}" class="btn btn-danger">Unlike <span class="badge badge-light">{{ $r->likes->count()}}</span></a>
                @else
                    <a href="{{ route('reply.like', ['id' => $r->id ]) }}" class="btn btn-success">Like <span class="badge badge-light">{{ $r->likes->count()}}</span></a>
                @endif
            </div>
    </div>
    @endforeach

    <div class="card">
        <div class="card-body">
            @if(Auth::check())
                <form action="{{ route('discussion.reply', ['id' => $d->id ])}}" method="POST">

                        {{ csrf_field() }}

                    <div class="form-group">
                        <label for="repy">Leave a reply...</label>
                        <textarea name="content" id="" cols="20" rows="5" class="form-control">
                        </textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Comment</button>
                    </div>
                </form>

            @else

            <h3>Sign in to leave a reply</h3>

            @endif
        </div>
    </div>
@endsection
