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

.container_boardUser{
    display: flex;
    flex-flow: row nowrap;
    align-items: center;
    margin: 1% 0%;
}
p, form {
    margin: 0 5px;
}

.addForm{
    margin-bottom: 1%;
}
</style>

@extends('layouts.main')

@section('title', "User's board " . $board->title)


@section('content')
    <h2>{{$board->title}}</h2>
    <div class="descript_board">Propriétaire : {{$board->owner->name}} : {{$board->owner->email}}</div>
    @if($board->owner->id === $owner->id)    
    <form action="{{route('boards.update', $board)}}" method="POST">
        @csrf
        @method('PUT')    
        <select name="user_id" id="user_id">
            @foreach($board->users as $user)
                @if($user->id != $board->owner->id)
                    <option value="{{$user->id}}">{{$user->name}} : {{$user->email}}</option>
                @endif
            @endforeach
        </select>
        @error('user_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit">Changer propriété</button>
    </form>
    @endif
    <div class="description">Description : {{$board->description}}</div>
    <div class="participant_list">Liste des participants</div>
        @foreach($board->users as $user)
        <div class="container_boardUser">
            <p>{{$user->name}}</p>
            <form action="{{route('boards.boarduser.destroy', $user->pivot)}}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit">Supprimer</button>
            </form>
        </div>
        @endforeach
    </div>

    <form action="{{route('boards.boarduser.store', $board)}}" method="POST" class="addForm">
        @csrf
        <select name="user_id" id="user_id">
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}} : {{$user->email}}</option>
            @endforeach
        </select>
        @error('user_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit">Ajouter</button>
    </form>
    <a class="addBoard" href="{{route('tasks.index', $board)}}">Tâches</a>
@endsection