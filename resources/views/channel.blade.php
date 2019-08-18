@extends('layouts.app')

@section('content')

    @foreach($discussion as $d)

        <div class="card mb-3">
            <div class="card-header">
                <img src="{{ $d->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;
                <span>{{ $d->user->name }}, <b>{{ $d->created_at->diffForHumans() }}</b></span>
                <a href="{{ route('discussion', ['slug' => $d->slug]) }}" class="btn btn-primary float-right">View</a>
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
                <p>
                    {{ $d->replies->count() }} Replies
                </p>
            </div>
        </div>

    @endforeach

    <div class="text-center">
        {{ $discussion->links() }}
    </div>
           
@endsection
