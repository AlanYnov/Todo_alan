<style>
.addBoard{
    width: 9%;
    background-color: #b666d2;
    text-decoration:none;
    color: white;
    display: flex;
    flex-flow: row nowrap;
    justify-content: center;
    align-items: center;
    padding: 10px 0px;
    border-radius: 10px;
    transition: all ease-out .5s;
}
.addBoard:hover{
    cursor: pointer;
    background-color: #d4a4e5;
    transition: all ease-out .5s;
}
</style>

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
            <form action="{{route('tasks.taskuser.destroy', $user->pivot)}}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit">Supprimer</button>
            </form>
        @endforeach

        @endif
    </div>
    <div class="add_user">
        <div class="add_user_margin">Ajouter un utilisateur à la tâche</div>
        <form action="{{route('tasks.taskuser.store', [$board, $task])}}" method="POST">
            @csrf
            <select name="participant_id" id="participant_id" class="add_user_margin">
                @foreach($task->participants as $participant)
                    @if(!in_array($participant->id, array_column(json_decode($task->assignedUsers, true), 'id')))
                        <option value="{{$participant->id}}">{{$participant->name}} : {{$participant->email}}</option>  
                    @endif
                @endforeach
            </select>
            @error('participant_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="add_button">Ajouter</button>
        </form>
    </div>
    <a class="addBoard" href="{{route('comments.index', [$board, $task])}}">Commentaires</a>

@endsection