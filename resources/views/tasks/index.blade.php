<style>
body{
    font-family: Tahoma,Verdana,sans-serif;
    font-size: 0.9rem;
}

h1 >span{
    font-weight:normal;
}

.trait{
    width: 100%;
    border: 1px solid grey;
}

.addBoard{
    width: 9%;
    background-color: #3479b6;
    text-decoration:none;
    color: white;
    display: flex;
    flex-flow: row nowrap;
    justify-content: center;
    align-items: center;
    padding: 10px 0px;
    border: 0;
    border-radius: 10px;
    transition: all ease-out .5s;
}

.addBoard:hover{
    cursor: pointer;
    background-color: #4facff;
    transition: all ease-out .5s;
}

table{
    width: 25%;
    margin-top: 1%;
    margin-bottom: 1%;
    border-spacing: 0;
    border-collapse: collapse;
}

td, th{
    border: 1px solid black;
    text-align: center;
}

th{
    padding: 2% 0;
    font-size: 2rem;
}

tbody .rubrique td{
    font-weight: bold;
    font-size: 1.25rem;
}

td{
    padding: 4% 2%;
}

td *{
    vertical-align : middle;
}
td a {
    background-color: lightgrey;
    text-decoration:none;
    color: white;
    border-radius: 10px;
    margin: 0% 2%;
    font-size: 0.9rem;
}

.showButton{
    background-color: #74d0f1;
    padding: 3% 2%;
    transition: all ease-out .5s;
}

.showButton:hover{
    background-color: #82deff;
    transition: all ease-out .5s;
}

.editButton{
    background-color: #1e80cb;
    padding: 3% 2%;
    transition: all ease-out .5s;
}


.editButton:hover{
    background-color: #38a9ff;
    transition: all ease-out .5s;
}

form{
    display: inline-block;
    background-color: #db5055;
    margin: 0% 2%;
    padding: 3% 2%;
    border-radius: 10px;
    cursor: pointer;
    transition: all ease-out .5s;
}

form:hover{
    background-color: #ff6e73;
    transition: all ease-out .5s;
}

form:hover button{
    background-color: #ff6e73;
    transition: all ease-out .5s;
}
form button{
    background-color: #db5055;
    color: white;
    border: 0;
    cursor: pointer;
    transition: all ease-out .5s;
}
</style>
@extends('layouts.main')

@section('title', "Board's tasks")


@section('content')
    <h1><span>Nom du Board : </span>{{$board->title}}</h1>
    <div class="trait"></div>
    <table>
    <thead>
        <tr>
            <th colspan="4">Liste des Tâches</th>
        </tr>
    </thead>
    <tbody>
        <tr class="rubrique">   
            <td>Titre</td>
            <td colspan="3">Actions</td>
        </tr>
    @foreach ($board->tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>
            <td><a class="showButton" href="{{route('tasks.show', [$board, $task])}}">Détails</a>
            <a class="editButton" href="{{route('tasks.edit', [$board, $task])}}">Éditer</a>
            <form action="{{route('tasks.destroy', [$board, $task])}}" method='POST'>
                @method('DELETE')
                @csrf
                
                <button type="submit">Delete</button>
            </form></td>
    @endforeach
        </tbody>
    </table>
    <a class="addBoard" href="{{route('tasks.create', $board)}}">Nouvelle tâche</a>
@endsection