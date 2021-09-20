@extends('master')
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
            <table class="table table-striped table-dark">
                <tr>
                    <th class="base_stat_header" Colspan="4">Move pool of {{$name}}</th>
                </tr>
                <tr>
                   <th scope="col">Level</th>
                   <th scope="col">Name</th>
                   <th scope="col">Game</th>
                   <th scope="col">method</th>
                   <th scope="col">Detail</th>
                </tr>
                @foreach ($moves as $move)
                    <tr>
                        @foreach ($move['version_group_details'] as $move_detail)
                            
                            {!! '<td class="table_data">' . $move_detail['level_learned_at'] . '</td>' !!}
                            {!! '<td class="table_data">' . $move['move']['name'] . '</td>' !!}
                            {!! '<td class="table_data">' . $move_detail['version_group']['name'] . '</td>' !!}
                            {!! '<td class="table_data">' . $move_detail['move_learn_method']['name'] . '</td>' !!}
                            {!! '<td class="table_data"><a href="'.$move['move']['url'] . '">Detail</a></td>' !!}
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </div> 
    </div>  
    @endsection
</body>
</html>