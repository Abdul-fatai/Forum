@extends('layouts.app')

@section('content')

    @foreach($discussion as $d)

        <div class="card mb-3">
            <div class="card-header">
                <img src="{{ $d->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;
                <span>{{ $d->user->name }}, <b>{{ $d->created_at->diffForHumans() }}</b></span>
                <a href="{{ route('discussion', ['slug' => $d->slug]) }}" class="btn btn-primary btn-sm float-right ml-2">View</a>
                @if($d->HasBestAnswer())
                <span class="btn btn-success btn-sm float-right ml-2">closed</span>
                @else
                    <span class="btn btn-danger btn-sm float-right  ml-2">open</span>
                @endif
           
            </div>

            <div class="card-body">
               <h4 class="text-center">
                    {{ $d->title }}
                </h4> 

                <p class="text-center">
                    {{ str_limit($d->content, 50) }}
                </p>
            </div>

            <div class="card-footer">
                <span>
                    {{ $d->replies->count() }} Replies
                </span>

                <a href="{{ route('channel', ['slug' => $d->channel->slug ]) }}" class="btn btn-primary btn-sm float-right">{{ $d->channel->title}}</a>
            </div>
        </div>

    @endforeach

    <div class="text-center">
        {{ $discussion->links() }}
    </div>
           
@endsection
