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

@section('title', "Task's comments")


@section('content')
<h1><span>Nom de la tâche : </span>{{$task->title}}</h1>
    <div class="trait"></div>
    <table>
    <thead>
        <tr>
            <th colspan="4">Liste des Commentaires</th>
        </tr>
    </thead>
    <tody>
        <tr class="rubrique">   
            <td>Commentaires</td>
            <td colspan="3">Actions</td>
        </tr>
    @foreach ($task->comments as $comment)
    <tr>
        <td>{{ $comment->text }}</td>
            <td><a class="showButton" href="{{route('comments.show', [$board, $task, $comment])}}">detail</a>
            <a class="editButton" href="{{route('comments.edit', [$board, $task, $comment])}}">edit</a>
            <form action="{{route('comments.destroy', [$board, $task, $comment])}}" method='POST'>
                @method('DELETE')
                @csrf
                
                <button type="submit">Delete</button>
            </form></td>
    </tr>
    @endforeach
        </tbody>
    </table>
    <a class="addBoard" href="{{route('comments.create', [$board, $task])}}">Ajouter commentaire</a>
@endsection