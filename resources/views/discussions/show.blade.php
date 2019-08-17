@extends('layouts.app')

@section('content')
    <div class="card mb-4">
            <div class="card-header">
                <img src="{{ $d->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;
                <span>{{ $d->user->name }}, <b>{{ $d->created_at->diffForHumans() }}</b></span>
            </div>

            <div class="card-body">
            <h4 class="text-center">
                    {{ $d->title }}
                </h4> 
                <hr>
                <p class="text-center">
                    {{ $d->content }}
                </p>
            </div>

            <div class="card-footer">
                <p>
                    {{ $d->replies->count() }} Replies
                </p>
            </div>
    </div>

    @foreach($d->replies as $r)
    <div class="card card mb-3">
            <div class="card-header">
                <img src="{{ $r->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;
                <span>{{ $r->user->name }}, <b>{{ $r->created_at->diffForHumans() }}</b></span>
            </div>

            <div class="card-body">
                <p class="text-center">
                    {{ $r->content }}
                </p>
            </div>

            <div class="card-footer">
                <p>
                    Like
                </p>
            </div>
    </div>
    @endforeach

    <div class="card">
        <div class="card-body">
            <form action="{{ route('discussion.reply', ['id' => $d->id ])}}" method="POST">

                    {{ csrf_field() }}

                <div class="form-group">
                    <label for="repy">Leave a reply...</label>
                    <textarea name="content" id="" cols="30" rows="10" class="form-control">
                    </textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Comment</button>
                </div>
            </form>
        </div>
    </div>
@endsection
