@extends('layouts.app')

@section('content')

    @foreach($discussion as $d)

        <div class="card mb-3">
            <div class="card-header">
                <img src="{{ $d->user->avatar }}" alt="" width="70px" height="70px">
            </div>

            <div class="card-body">
                {{ $d->content }}
            </div>
        </div>

    @endforeach

    <div class="text-center">
        {{ $discussion->links() }}
    </div>
           
@endsection
