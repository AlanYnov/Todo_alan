<style>
body{
    font-family: Tahoma,Verdana,sans-serif;
    font-size: 0.9rem;
}

.trait{
    width: 100%;
    border: 1px solid grey;
}

.entreeForm{
    width: 20%;
    margin: 2% 0% 1% 0%;
    display: flex;
    flex-flow: column nowrap;
}

.entreeForm div{
    display: flex;
    flex-flow: row nowrap;
    justify-content: space-between;
    align-items:center;
    margin: 0% 25% 5% 10%;
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

input{
    border: 0;
    border-bottom: 2px solid gray;
}
</style>

@extends('layouts.main')

@section('title', "Create a new task")


@section('content')
<h1>Ajouter une Tâche </h1>
    <div class="trait"></div>
    <div>
        <form action="{{route('tasks.store', $board)}}" method="POST">
            @csrf
            <div class="entreeForm">
                <div>
                    <label for="title">title</label>
                    <input id="title" type="text" name="title" class="@error('title') is-invalid @enderror">

                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="description">Description</label>
                    <input type='textarea' name='description' id="description" >
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="due_date">Date de fin</label>
                    <input type='date' name='due_date' id="due_date" >
                </div>
                <div>
                    <span>Catégorie</span>
                    <select name="category_id" id="category_id">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button class="addBoard" type="submit">Créer la tâche</button>
        </form>

    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
@endsection