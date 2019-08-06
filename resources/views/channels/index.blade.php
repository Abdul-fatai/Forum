@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Channels</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($channels as $channel)
                            <tr>
                                <td>{{ $channel->title }}</td>
                                <td> 
                                    <a href="{{ route('channels.edit', ['channel' => $channel->id ]) }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td> 
                                    <form action="{{ route('channels.destroy', ['channel' => $channel->id ])}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    
                                        <button class="btn btn-danger" type="submit">Destroy</button>
                                    </form>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
