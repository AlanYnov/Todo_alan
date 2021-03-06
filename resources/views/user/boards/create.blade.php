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

@section('title', "Create a new board")


@section('content')

    <h1>Ajouter un Board </h1>
    <div class="trait"></div>
    <div>
        <form action="/boards" method="POST">
            @csrf
            <div class="entreeForm">
                <div>
                    <label for="title">Titre</label>
                    <input id="title" type="text" name="title" class="@error('title') is-invalid @enderror" placeholder="Titre">

                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="description">Description</label>
                    <input type='textarea' name='description' id="description" placeholder="Description">
                </div>
            </div>
            <button class="addBoard" type="submit">Créer le Board</button>
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