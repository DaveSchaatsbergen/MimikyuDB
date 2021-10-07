@extends('master')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title
        >@section('title', 'pokemon '.$name.'')
    </title>
</head>
<body>
    @section('content')
    <div class="pokemon_info_container">
        {{-- additional info --}}
        <table class="table table-striped table-dark">
            <tr>
                <th class="base_stat_header devided4" Colspan="4">{{$name}} sprites</th>
            </tr>
            <tr>
               <th scope="col" class="devided4">abilities</th>
               <th scope="col" class="devided4">weight</th>
               <th scope="col" class="devided4">National dex number</th>
               <th scope="col" class="devided4">Name</th>
            </tr>
            <tr>
                <td class="table_data ability">
                @foreach ($abilities as $abilitiy)
                    {!!"<p>" . $abilitiy['ability']['name']. "</p>"!!}
                @endforeach
                </td>
                <td class="table_data ">{{$weight}} lbs</td>
            </tr>
        </table>
        {{-- sprite container  --}}
        <table class="table table-striped table-dark">
            <tr>
                <th class="base_stat_header devided4" Colspan="4">{{$name}} sprites</th>
            </tr>
            <tr>
               <th scope="col" class="devided4">Normal</th>
               <th scope="col" class="devided4">Shiny</th>
               <th scope="col" class="devided4">Icon</th>
               <th scope="col" class="devided4">Type(s)</th>
            </tr>
            <tr>
                {!! '<td class="table_data"><img src="' . $sprites['front_default'] . '" alt="default front" class="spriteImage"></td>' !!}
                {!! '<td class="table_data"><img src="' . $sprites['front_shiny'] . '" alt="shiny front" class="spriteImage"></td>' !!}
                {!! '<td class="table_data"><img src="' . $icon['front_default'] . '" alt="icon front" class="spriteImage"></td>' !!}
                @if (count($types) < 2)
                    {!! '<td class="table_data"><img src="images/' . $types[0]['type']['name'] . '.png" alt="type 1"></td>' !!}
                @else
                    {!! '<td class="table_data types">
                            <img src="images/' . $types[0]['type']['name'] . '.png" alt="type 1">
                            <br>
                            <img src="images/' . $types[1]['type']['name'] . '.png" alt="type 2">
                        </td>' !!}
                @endif
            </tr>
        </table>
        {{-- move_container --}}
            <table class="table table-striped table-dark">
                <tr>
                    <th class="base_stat_header devided5" Colspan="5">Move pool of {{$name}}</th>
                </tr>
                <tr>
                   <th scope="col" class="devided5">Level</th>
                   <th scope="col" class="devided5">Name</th>
                   <th scope="col" class="devided5">Game</th>
                   <th scope="col" class="devided5">method</th>
                   <th scope="col" class="devided5">Detail</th>
                </tr>
                {{-- @foreach ($moves as $move)
                    <tr>
                        @foreach ($move['version_group_details'] as $move_detail)
                            
                            {!! '<td class="table_data">' . $move_detail['level_learned_at'] . '</td>' !!}
                            {!! '<td class="table_data">' . $move['move']['name'] . '</td>' !!}
                            {!! '<td class="table_data">' . $move_detail['version_group']['name'] . '</td>' !!}
                            {!! '<td class="table_data">' . $move_detail['move_learn_method']['name'] . '</td>' !!}
                            {!! '<td class="table_data"><a href="'.$move['move']['url'] . '">Detail</a></td>' !!}
                        @endforeach
                    </tr>
                @endforeach --}}
            </table>
        {{-- base stats --}}
        <table class="table table-striped table-dark">
            <tr>
                <th class="base_stat_header" Colspan="6">Base Stats of {{$name}}</th>
            </tr>
            <tr>
            @foreach ($stats as $base_stat)
                {!! '<th scope="col" class="devided6">' . $base_stat['stat']['name'] . '</th>' !!}
            @endforeach
            </tr>
            <tr>
                @foreach ($stats as $base_stat)
                {!! '<td class="table_data devided6">' . $base_stat['base_stat'] . '</td>' !!}
                @endforeach
            </tr>
        </table> 
    </div>  
    @endsection

    {{-- pokeball loading animation --}}
    <div class="loading_wrapper">
        <div class="pokeball">
            <div class="pokeball__button"></div>
        </div>
        Loading...
    </div>
    <script>
        jQuery(document).ready(function($) {
            $(window).on("load",function(){
                $(".loading_wrapper").fadeOut( "slow" );
            });
        });
    </script>
</body>
</html>