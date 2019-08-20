@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Update Discussion</div>

        <div class="card-body">
           <form action="{{ route('discussions.update', ['id' => $discussion->id ]) }} " method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="content">Ask a question</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $discussion->content }}</textarea>
                </div>
                
                <div class="form-group text-center">
                    <button class="btn btn-primary">Save discussion changes</button>
                </div>
           </form>
        </div>
    </div>
@endsection
