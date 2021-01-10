<style>

body{
    font-family: Tahoma,Verdana,sans-serif;
    font-size: 0.9rem;
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
    border-radius: 10px;
    transition: all ease-out .5s;
}

.addBoard:hover{
    cursor: pointer;
    background-color: #4facff;
    transition: all ease-out .5s;
}

.addBoard i {
    margin-right : 5px;
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
    font-size: 1.5rem;
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

@section('title', "User's board")


@section('content')
    @if(count($boards) == 0)
        <p>Vous n'avez aucun board</p>
    @else
    <h1>Boards </h1>
    <div class="trait"></div>
    @endif
    <table>
    <thead>
        <tr>
            <th colspan="4">Liste des Boards</th>
        </tr>
    </thead>
    <tbody>
        <tr class="rubrique">   
            <td>Titre</td>
            <td colspan="3">Actions</td>
        </tr>
    @foreach ($boards as $board)
        <tr>
        <td>{{ $board->title }}</td>
            @can('view', $board)
            <td><a class="showButton" href="{{route('boards.show', $board)}}">Détails</a>
            @endcan
            @can('update', $board)
            <a class="editButton" href="{{route('boards.edit', $board)}}">Éditer</a>
            @endcan
            @can('delete', $board)
            <form action="{{route('boards.destroy', $board->id)}}" method='POST'>
                @method('DELETE')
                @csrf
                
                <button class="deleteButton" type="submit">Delete</button>
            </form></td>
            @endcan
            </tr>
    @endforeach
    </tbody>
    </table>
    @can('create', $board)
        <a class="addBoard" href="{{route('boards.create')}}">Nouveau Board</a>
    @endcan
@endsection
