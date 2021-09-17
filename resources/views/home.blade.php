@extends('master')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title
        >@section('title', 'Homepage')
    </title>
</head>
<body>
    @section('content')
    <div class="HomeContainer">
        <h1 id="intro_header">Welcome to MimikyuDB!</h1>
        <p id="intro_text">Here you can search everything up about pokemons of each gen. You can use the searchbar to find the pokemon info u want!<p>
    </div>  
    @endsection
</body>
</html>