@extends('master')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@section('title', 'error 404')</title>
</head>
<body>
    @section('content')
    <div class="errorHandler">
        <p class="text404">404</p>
        <p class="text404">The page or pokémon you tried to search doesn't exist. Try again.</p>
    </div>
    @endsection
</body>
</html>