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
        {{-- additional info --}}
        <table class="table table-striped table-dark">
            <tr>
                <th class="base_stat_header devided4" Colspan="4">Info</th>
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
                <td class="table_data ">{{$weight}} Lbs</td>
                <td class="table_data ">#{{$dexNumber}}</td>
                <td class="table_data ">{{$name}}</td>
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

    {{-- gen 1 red blue --}}
        @if (!empty($redBlue))
            <table class="table table-striped table-dark">
                <tr>
                    <th class="base_stat_header devided5" Colspan="5">Move pool of {{$name}} in Pokémon Red and Blue</th>
                </tr>
                <tr>
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr>
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b>Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($redBlue as $move_data)
                    <tr>
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b>Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr>'!!}
                    @endif
                    {!!'<td class="table_data">'.$move_data['level_learned_at'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['move_name'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['game'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['method'].'</td>'!!}
                    {!!'<td class="table_data"><a href="'.$move_data['url'].'">Details</a></td>'!!}
                    </tr>
                    @endforeach
                </tr>
            </table>
        @endif

        {{-- Gen 1 Yellow --}}
        @if (!empty($yellow))
            <table class="table table-striped table-dark">
                <tr>
                    <th class="base_stat_header devided5" Colspan="5">Move pool of {{$name}} in Pokémon Yellow</th>
                </tr>
                <tr>
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr>
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b>Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($yellow as $move_data)
                    <tr>
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b>Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr>'!!}
                    @endif
                    {!!'<td class="table_data">'.$move_data['level_learned_at'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['move_name'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['game'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['method'].'</td>'!!}
                    {!!'<td class="table_data"><a href="'.$move_data['url'].'">Details</a></td>'!!}
                    </tr>
                    @endforeach
                </tr>
            </table>
        @endif
        
        {{-- Gen 2 gold silver --}}
        @if (!empty($goldSilver))
            <table class="table table-striped table-dark">
                <tr>
                    <th class="base_stat_header devided5" Colspan="5">Move pool of {{$name}} in Pokémon Gold and Silver</th>
                </tr>
                <tr>
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr>
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b>Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($goldSilver as $move_data)
                    <tr>
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b>Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr>'!!}
                    @endif
                    {!!'<td class="table_data">'.$move_data['level_learned_at'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['move_name'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['game'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['method'].'</td>'!!}
                    {!!'<td class="table_data"><a href="'.$move_data['url'].'">Details</a></td>'!!}
                    </tr>
                    @endforeach
                </tr>
            </table>
        @endif

        {{-- gen 2 Crystal --}}
        @if (!empty($crystal))
            <table class="table table-striped table-dark">
                <tr>
                    <th class="base_stat_header devided5" Colspan="5">Move pool of {{$name}} in Pokémon Crystal</th>
                </tr>
                <tr>
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr>
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b>Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($crystal as $move_data)
                    <tr>
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b>Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr>'!!}
                    @endif
                    {!!'<td class="table_data">'.$move_data['level_learned_at'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['move_name'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['game'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['method'].'</td>'!!}
                    {!!'<td class="table_data"><a href="'.$move_data['url'].'">Details</a></td>'!!}
                    </tr>
                    @endforeach
                </tr>
            </table>
        @endif

        {{-- gen 3 ruby saphire --}}
        @if (!empty($rubySaphire))
            <table class="table table-striped table-dark">
                <tr>
                    <th class="base_stat_header devided5" Colspan="5">Move pool of {{$name}} in Pokémon Ruby and Saphire</th>
                </tr>
                <tr>
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr>
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b>Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($rubySaphire as $move_data)
                    <tr>
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b>Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr>'!!}
                    @endif
                    {!!'<td class="table_data">'.$move_data['level_learned_at'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['move_name'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['game'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['method'].'</td>'!!}
                    {!!'<td class="table_data"><a href="'.$move_data['url'].'">Details</a></td>'!!}
                    </tr>
                    @endforeach
                </tr>
            </table>
        @endif

        {{-- gen 3 emerald --}}
        @if (!empty($emerald))
            <table class="table table-striped table-dark">
                <tr>
                    <th class="base_stat_header devided5" Colspan="5">Move pool of {{$name}} in Pokémon emerald</th>
                </tr>
                <tr>
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr>
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b>Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($emerald as $move_data)
                    <tr>
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b>Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr>'!!}
                    @endif
                    {!!'<td class="table_data">'.$move_data['level_learned_at'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['move_name'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['game'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['method'].'</td>'!!}
                    {!!'<td class="table_data"><a href="'.$move_data['url'].'">Details</a></td>'!!}
                    </tr>
                    @endforeach
                </tr>
            </table>
        @endif

        {{-- gen 3 fire red and leaf green --}}
        @if (!empty($fireRedLeafGreen))
            <table class="table table-striped table-dark">
                <tr>
                    <th class="base_stat_header devided5" Colspan="5">Move pool of {{$name}} in Pokémon Fire red and Leaf green</th>
                </tr>
                <tr>
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr>
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b>Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($fireRedLeafGreen as $move_data)
                    <tr>
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b>Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr>'!!}
                    @endif
                    {!!'<td class="table_data">'.$move_data['level_learned_at'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['move_name'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['game'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['method'].'</td>'!!}
                    {!!'<td class="table_data"><a href="'.$move_data['url'].'">Details</a></td>'!!}
                    </tr>
                    @endforeach
                </tr>
            </table>
        @endif

        {{-- gen 4 diamond pearl --}}
        @if (!empty($diamondPearl))
            <table class="table table-striped table-dark">
                <tr>
                    <th class="base_stat_header devided5" Colspan="5">Move pool of {{$name}} in Pokémon Diamond and Pearl</th>
                </tr>
                <tr>
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr>
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b>Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($diamondPearl as $move_data)
                    <tr>
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b>Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr>'!!}
                    @endif
                    {!!'<td class="table_data">'.$move_data['level_learned_at'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['move_name'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['game'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['method'].'</td>'!!}
                    {!!'<td class="table_data"><a href="'.$move_data['url'].'">Details</a></td>'!!}
                    </tr>
                    @endforeach
                </tr>
            </table>
        @endif

        {{-- gen 4 platinum --}}
        @if (!empty($platinum))
            <table class="table table-striped table-dark">
                <tr>
                    <th class="base_stat_header devided5" Colspan="5">Move pool of {{$name}} in Pokémon Platinum</th>
                </tr>
                <tr>
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr>
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b>Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($platinum as $move_data)
                    <tr>
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b>Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr>'!!}
                    @endif
                    {!!'<td class="table_data">'.$move_data['level_learned_at'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['move_name'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['game'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['method'].'</td>'!!}
                    {!!'<td class="table_data"><a href="'.$move_data['url'].'">Details</a></td>'!!}
                    </tr>
                    @endforeach
                </tr>
            </table>
        @endif

        {{-- gen 5 black and white --}}
        @if (!empty($blackWhite))
            <table class="table table-striped table-dark">
                <tr>
                    <th class="base_stat_header devided5" Colspan="5">Move pool of {{$name}} in Pokémon Black and White</th>
                </tr>
                <tr>
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr>
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b>Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($blackWhite as $move_data)
                    <tr>
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b>Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr>'!!}
                    @endif
                    {!!'<td class="table_data">'.$move_data['level_learned_at'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['move_name'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['game'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['method'].'</td>'!!}
                    {!!'<td class="table_data"><a href="'.$move_data['url'].'">Details</a></td>'!!}
                    </tr>
                    @endforeach
                </tr>
            </table>
        @endif

        {{-- gen 5 black and white 2 --}}
        @if (!empty($blackWhite2))
            <table class="table table-striped table-dark">
                <tr>
                    <th class="base_stat_header devided5" Colspan="5">Move pool of {{$name}} in Pokémon Black 2 and White 2</th>
                </tr>
                <tr>
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr>
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b>Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($blackWhite2 as $move_data)
                    <tr>
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b>Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr>'!!}
                    @endif
                    {!!'<td class="table_data">'.$move_data['level_learned_at'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['move_name'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['game'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['method'].'</td>'!!}
                    {!!'<td class="table_data"><a href="'.$move_data['url'].'">Details</a></td>'!!}
                    </tr>
                    @endforeach
                </tr>
            </table>
        @endif

        {{-- gen 6 xy --}}
        @if (!empty($xy))
            <table class="table table-striped table-dark">
                <tr>
                    <th class="base_stat_header devided5" Colspan="5">Move pool of {{$name}} in Pokémon X and Y</th>
                </tr>
                <tr>
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr>
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b>Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($xy as $move_data)
                    <tr>
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b>Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr>'!!}
                    @endif
                    {!!'<td class="table_data">'.$move_data['level_learned_at'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['move_name'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['game'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['method'].'</td>'!!}
                    {!!'<td class="table_data"><a href="'.$move_data['url'].'">Details</a></td>'!!}
                    </tr>
                    @endforeach
                </tr>
            </table>
        @endif

        {{-- gen 6 oras --}}
        @if (!empty($omegaAlpha))
            <table class="table table-striped table-dark">
                <tr>
                    <th class="base_stat_header devided5" Colspan="5">Move pool of {{$name}} in Pokémon Omega ruby Alpha Saphire</th>
                </tr>
                <tr>
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr>
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b>Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($omegaAlpha as $move_data)
                    <tr>
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b>Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr>'!!}
                    @endif
                    {!!'<td class="table_data">'.$move_data['level_learned_at'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['move_name'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['game'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['method'].'</td>'!!}
                    {!!'<td class="table_data"><a href="'.$move_data['url'].'">Details</a></td>'!!}
                    </tr>
                    @endforeach
                </tr>
            </table>
        @endif

        {{-- gen 7 sun moon --}}
        @if (!empty($sunMoon))
            <table class="table table-striped table-dark">
                <tr>
                    <th class="base_stat_header devided5" Colspan="5">Move pool of {{$name}} in Pokémon Sun and Moon</th>
                </tr>
                <tr>
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr>
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b>Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($sunMoon as $move_data)
                    <tr>
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b>Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr>'!!}
                    @endif
                    {!!'<td class="table_data">'.$move_data['level_learned_at'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['move_name'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['game'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['method'].'</td>'!!}
                    {!!'<td class="table_data"><a href="'.$move_data['url'].'">Details</a></td>'!!}
                    </tr>
                    @endforeach
                </tr>
            </table>
        @endif

        {{-- gen 7 ultra sun moon --}}
        @if (!empty($ultraSunMoon))
            <table class="table table-striped table-dark">
                <tr>
                    <th class="base_stat_header devided5" Colspan="5">Move pool of {{$name}} in Pokémon Ultra sun and Ultra moon</th>
                </tr>
                <tr>
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr>
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b>Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($ultraSunMoon as $move_data)
                    <tr>
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b>Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr>'!!}
                    @endif
                    {!!'<td class="table_data">'.$move_data['level_learned_at'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['move_name'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['game'].'</td>'!!}
                    {!!'<td class="table_data">'.$move_data['method'].'</td>'!!}
                    {!!'<td class="table_data"><a href="'.$move_data['url'].'">Details</a></td>'!!}
                    </tr>
                    @endforeach
                </tr>
            </table>
        @endif

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

</body>
</html>