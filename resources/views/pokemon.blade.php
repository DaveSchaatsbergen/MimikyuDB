@extends('master')
<?php
// make all the count variables
$count_abilities = count($abilities);
$count_moves = count($moves);
$count_stats = count($stats);
$count_types = count($types);
$count_sprite = count($sprite);
echo $count_moves;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title
        >@section('title', 'pokemon '.$name.'')
    </title>
</head>
<body>
    @section('content')
    <div class="pokemon_info_container">
        {{-- stat container --}}
        <div class="stat_container">
            <table class="table table-striped table-dark">
                <tr>
                    <th class="base_stat_header" Colspan="6">Base Stats of {{$name}}</th>
                </tr>
                <tr>
                @foreach ($stats as $base_stat)
                    {!! '<th scope="col">' . $base_stat['stat']['name'] . '</th>' !!}
                @endforeach
                </tr>
                <tr>
                    @foreach ($stats as $base_stat)
                    {!! '<td class="table_data">' . $base_stat['base_stat'] . '</td>' !!}
                    @endforeach
                </tr>
            </table>
        </div>
         {{--info container  --}}
        <div class="info_container">

        </div> 
        {{-- move_container --}}
        <div class="move_container">

        </div> 
    </div>  
    @endsection
</body>
</html>