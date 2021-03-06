@extends('layouts.main')

@section('title', "Task " .  $task->title)


@section('content')
    <h2>{{$task->title}}'s Comment</h2>
    <p>{{$comment->text}}</p>
    <div class="participants">
        @foreach($task->assignedUsers as $user) 
            <p>{{$user->name}} : {{$user->email}}</p>
            {{-- <form action="{{route('boards.boarduser.destroy', $user->pivot)}}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit">Supprimer</button>
            </form> --}}
        @endforeach
    </div>


@endsection