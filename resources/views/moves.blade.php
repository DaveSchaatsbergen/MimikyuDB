@extends('master')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title
        >@section('title', 'moves '.$name.'')
    </title>
</head>
<body>
    @section('content')
    <div class="pokemon_info_container">
        <table class="table table-striped table-dark">
            <tr>
                <th class="devided5" Colspan="8">Move info of {{$name}}</th>
            </tr>
            <tr>
               <th scope="col" class="devided8">Name</th>
               <th scope="col" class="devided8">Power</th>
               <th scope="col" class="devided8">pp</th>
               <th scope="col" class="devided8">Description</th>
               <th scope="col" class="devided8">Accuracy</th>
               <th scope="col" class="devided8">Damage type</th>
               <th scope="col" class="devided8">type</th>
               <th scope="col" class="devided8">priority</th>
            </tr>
            <tr>
                <td class="table_data ">{{$name}}</td>
                <td class="table_data ">{{$power}}</td>
                <td class="table_data ">{{$pp}}</td>
                <td class="table_data ">{{$moveText}}</td>
                <td class="table_data ">{{$accuracy}}</td>
                <td class="table_data ">{{$damageClass}}</td>
                {!! '<td class="table_data"><img src="/images/' . $type . '.png" alt="'.$type.'"></td>' !!}
                <td class="table_data ">{{$priority}}</td>
            </tr>
        </table>

        <table class="table table-striped table-dark">
            <tr>
                <th class="devided1" Colspan="2">Pokémon that can learn {{$name}}</th>
            </tr>
            <tr>
               <th scope="col" class="devided2">Name</th>
               <th scope="col" class="devided2">Link to pokémon</th>
            </tr>
            <tr>
                @foreach ($learnedBy as $pokemon)
                {!!'<td class="table_data" Colspan="1">'.$pokemon["name"].'</td>'!!}
                <td class="table_data" Colspan="1"><a href="{{url('/pokemon/'.$pokemon["name"].'')}}">Go to pokémon info</a></td>
                </tr><tr>
                @endforeach
            </tr>
        </table>
    </div>  
    @endsection
</body>
</html>