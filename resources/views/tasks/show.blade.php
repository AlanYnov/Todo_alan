@extends('layouts.main')

@section('title', "Task " .  $task->title)


@section('content')
    <h2>{{$task->title}}</h2>
    <p>{{$task->description}}</p>
    <p>À finir avant le {{$task->due_date}}</p>
    <p>Status :  {{$task->state}}</p>
    <div class="participants">

            @if(count($task->assignedUsers) == 0)
            <p>Vous n'avez aucun utilisateurs assignés à la tâche</p>
            @else
            Liste des participants à la tâche
            @foreach($task->assignedUsers as $user) 
            <p>{{$user->name}} : {{$user->email}}</p>
            {{-- <form action="{{route('boards.boarduser.destroy', $user->pivot)}}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit">Supprimer</button>
            </form> --}}
        @endforeach

        @endif
    </div>
    <a href="{{route('comments.index', [$board, $task])}}">Commentaires</a>

@endsection