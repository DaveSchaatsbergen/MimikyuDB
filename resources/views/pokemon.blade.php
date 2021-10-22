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
                <th class="devided4" Colspan="4">Info</th>
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
                <th class="devided4" Colspan="4">{{$name}} sprites</th>
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
        <table class="table table-striped table-dark pokemon">
            <tr>
                <th class="devided5 headertext" Colspan="5">Move pool of {{$name}}</th>
            </tr>
        </table>
    {{-- gen 1 red blue --}}
        @if (!empty($redBlue))
            <table class="table table-striped table-dark pokemon">
                <tr>
                    <th id="redBlue" class="devided5 gameHeader" onclick="toggleVisability(0)" Colspan="5">Pokémon Red and Blue <i class="fas fa-chevron-down arrow0"></i></th>
                </tr>
                <tr class="hidden gameInfo0">
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr class="hidden gameInfo0">
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b class="headertext">Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($redBlue as $move_data)
                    <tr class="hidden gameInfo0">
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b class="headertext">Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr class="hidden gameInfo0">'!!}
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
            <table class="table table-striped table-dark pokemon">
                <tr>
                    <th class="devided5 gameHeader" onclick="toggleVisability(1)" Colspan="5">Pokémon Yellow <i class="fas fa-chevron-down arrow1"></i></th>
                </tr>
                <tr class="hidden gameInfo1">
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr class="hidden gameInfo1">
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b class="headertext">Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($yellow as $move_data)
                    <tr class="hidden gameInfo1">
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b class="headertext">Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr class="hidden gameInfo1">'!!}
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
                    <th class="devided5 gameHeader" onclick="toggleVisability(2)" Colspan="5">Pokémon Gold and Silver <i class="fas fa-chevron-down arrow2"></i></th>
                </tr>
                <tr class="hidden gameInfo2">
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr class="hidden gameInfo2">
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b class="headertext">Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($goldSilver as $move_data)
                    <tr class="hidden gameInfo2">
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b class="headertext">Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr class="hidden gameInfo2">'!!}
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
                    <th class="devided5 gameHeader" onclick="toggleVisability(3)" Colspan="5">Pokémon Crystal <i class="fas fa-chevron-down arrow3"></i></th>
                </tr>
                <tr class="hidden gameInfo3">
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr class="hidden gameInfo3">
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b class="headertext">Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($crystal as $move_data)
                    <tr class="hidden gameInfo3">
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b class="headertext">Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr class="hidden gameInfo3">'!!}
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
                    <th class="devided5  gameHeader" onclick="toggleVisability(4)" Colspan="5">Pokémon Ruby and Saphire <i class="fas fa-chevron-down arrow4"></i></th>
                </tr>
                <tr class="hidden gameInfo4">
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr class="hidden gameInfo4">
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b class="headertext">Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($rubySaphire as $move_data)
                    <tr class="hidden gameInfo4">
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b class="headertext">Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr class="hidden gameInfo4">'!!}
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
                    <th class="devided5  gameHeader" onclick="toggleVisability(5)" Colspan="5">Pokémon emerald <i class="fas fa-chevron-down arrow5"></i></th>
                </tr>
                <tr class="hidden gameInfo5">
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr class="hidden gameInfo5">
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b class="headertext">Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($emerald as $move_data)
                    <tr class="hidden gameInfo5">
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b class="headertext">Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr class="hidden gameInfo5">'!!}
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
                    <th class="devided5  gameHeader" onclick="toggleVisability(6)" Colspan="5">Pokémon Fire red and Leaf green <i class="fas fa-chevron-down arrow6"></i></th>
                </tr>
                <tr class="hidden gameInfo6">
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr class="hidden gameInfo6">
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b class="headertext">Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($fireRedLeafGreen as $move_data)
                    <tr class="hidden gameInfo6">
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b class="headertext">Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr class="hidden gameInfo6">'!!}
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
                    <th class="devided5  gameHeader" onclick="toggleVisability(7)" Colspan="5">Pokémon Diamond and Pearl <i class="fas fa-chevron-down arrow7"></i></th>
                </tr>
                <tr class="hidden gameInfo7">
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr class="hidden gameInfo7">
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b class="headertext">Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($diamondPearl as $move_data)
                    <tr class="hidden gameInfo7">
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b class="headertext">Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr class="hidden gameInfo7">'!!}
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
                    <th class="devided5  gameHeader" onclick="toggleVisability(8)" Colspan="5">Pokémon Platinum <i class="fas fa-chevron-down arrow8"></i></th>
                </tr>
                <tr class="hidden gameInfo8">
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr class="hidden gameInfo8">
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b class="headertext">Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($platinum as $move_data)
                    <tr class="hidden gameInfo8">
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b class="headertext">Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr class="hidden gameInfo8">'!!}
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
                    <th class="devided5 gameHeader" onclick="toggleVisability(9)" Colspan="5">Pokémon Black and White <i class="fas fa-chevron-down arrow9"></i></th>
                </tr>
                <tr class="hidden gameInfo9">
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr class="hidden gameInfo9">
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b class="headertext">Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($blackWhite as $move_data)
                    <tr class="hidden gameInfo9">
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b class="headertext">Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr class="hidden gameInfo9">'!!}
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
                    <th class="devided5 gameHeader" onclick="toggleVisability(10)" Colspan="5">Pokémon Black 2 and White 2 <i class="fas fa-chevron-down arrow10"></i></th>
                </tr>
                <tr class="hidden gameInfo10">
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr class="hidden gameInfo10">
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b class="headertext">Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($blackWhite2 as $move_data)
                    <tr class="hidden gameInfo10">
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b class="headertext">Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr class="hidden gameInfo10">'!!}
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
                    <th class="devided5 gameHeader" onclick="toggleVisability(11)" Colspan="5">Pokémon X and Y <i class="fas fa-chevron-down arrow11"></i></th>
                </tr>
                <tr class="hidden gameInfo11">
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr class="hidden gameInfo11">
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b class="headertext">Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($xy as $move_data)
                    <tr class="hidden gameInfo11">
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b class="headertext">Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr class="hidden gameInfo11">'!!}
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
                    <th class="devided5 gameHeader" onclick="toggleVisability(12)" Colspan="5">Pokémon Omega ruby Alpha Saphire <i class="fas fa-chevron-down arrow12"></i></th>
                </tr>
                <tr class="hidden gameInfo12">
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr class="hidden gameInfo12">
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b class="headertext">Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($omegaAlpha as $move_data)
                    <tr class="hidden gameInfo12">
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b class="headertext">Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr class="hidden gameInfo12">'!!}
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
                    <th class="devided5 gameHeader" onclick="toggleVisability(13)" Colspan="5">Pokémon Sun and Moon <i class="fas fa-chevron-down arrow13"></i></th>
                </tr>
                <tr class="hidden gameInfo13">
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr class="hidden gameInfo13">
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b class="headertext">Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($sunMoon as $move_data)
                    <tr class="hidden gameInfo13">
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b class="headertext">Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr class="hidden gameInfo13">'!!}
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
                    <th class="devided5 gameHeader" onclick="toggleVisability(14)" Colspan="5">Pokémon Ultra sun and Ultra moon <i class="fas fa-chevron-down arrow14"></i></th>
                </tr>
                <tr class="hidden gameInfo14">
                <th scope="col" class="devided5">Level</th>
                <th scope="col" class="devided5">Name</th>
                <th scope="col" class="devided5">Game</th>
                <th scope="col" class="devided5">method</th>
                <th scope="col" class="devided5">Detail</th>
                </tr>
                <tr class="hidden gameInfo14">
                    <?php $x = 0; ?>
                    <td class="table_data" Colspan="5"><b class="headertext">Moves Learned through HM/TM/Egg/Tutor</b></td>
                    @foreach ($ultraSunMoon as $move_data)
                    <tr class="hidden gameInfo14">
                    @if ($move_data['level_learned_at'] > 0 && $x === 0) 
                        {!!'<td class="table_data" Colspan="5"><b class="headertext">Moves learned through level up</b></td>'!!}
                        <?php $x++; ?>
                        {!!'</tr> <tr class="hidden gameInfo14">'!!}
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
                <th class="headertext" Colspan="6">Base Stats of {{$name}}</th>
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