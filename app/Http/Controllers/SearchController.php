<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //Search up pokemon from pokeAPI
    public function searchPokemon($id = false) {
        if (!empty($_POST)) {
            $id = htmlspecialchars($_POST['pokemonName']);
        } else {
            $id = htmlspecialchars($id);
        }
        try {
            $pokemon = file_get_contents('https://pokeapi.co/api/v2/pokemon/'.$id);
            $pokemon_data = json_decode($pokemon, true);
        } catch (Exception $e) {
            abort(404);
        }
        // set all the variables
        $name = $pokemon_data['name'];
        $abilities = $pokemon_data['abilities'];
        $dexNumber = $pokemon_data['id'];
        $moves = $pokemon_data['moves'];
        $stats = $pokemon_data['stats'];
        $types = $pokemon_data['types'];
        $weight = $pokemon_data['weight'];
        $sprites = $pokemon_data['sprites']['versions']['generation-vii']['ultra-sun-ultra-moon'];
        $icon = $pokemon_data['sprites']['versions']['generation-vii']['icons'];
        // get move id from the url request link
        
        // making arrays to order gen info in
        $redBlue = [];
        $yellow = [];
        $goldSilver = [];
        $crystal = [];
        $rubySaphire = [];
        $emerald = [];
        $fireRedLeafGreen = [];
        $diamondPearl = [];
        $platinum = [];
        $hearthgoldSoulsivler = [];
        $blackWhite = [];
        $blackWhite2 = [];
        $xy = [];
        $omegaAlpha = [];
        $sunMoon = [];
        $ultraSunMoon = [];
        // looping through all the moves and order them in gen arrays
        foreach ($moves as $move){
            foreach ($move['version_group_details'] as $move_detail) {
                switch($move_detail['version_group']['name']) {
                    // pokemon red and blue
                    case "red-blue":
                        // get move url id first
                        $url = explode('/', $move['move']['url']);
                        $url = $url[6];
                        // merge everything in array
                        $redBlue = array_merge($redBlue, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $url
                        )));
                    break;
                    // pokemon Yellow
                    case "yellow":
                        // get move url id first
                        $url = explode('/', $move['move']['url']);
                        $url = $url[6];
                        $yellow = array_merge($yellow, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $url
                        )));
                    break;
                    // pokemon gold and silver
                    case "gold-silver":
                        // get move url id first
                        $url = explode('/', $move['move']['url']);
                        $url = $url[6];
                        $goldSilver = array_merge($goldSilver, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $url
                        )));
                    break;
                    // pokemon crystal
                    case "crystal":
                        // get move url id first
                        $url = explode('/', $move['move']['url']);
                        $url = $url[6];
                        $crystal = array_merge($crystal, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $url
                        )));
                    break;
                    // pokemon ruby and saphire
                    case "ruby-sapphire":
                        // get move url id first
                        $url = explode('/', $move['move']['url']);
                        $url = $url[6];
                        $rubySaphire = array_merge($rubySaphire, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $url
                        )));
                    break;
                    // pokemon fire red and leaf green
                    case "firered-leafgreen":
                        // get move url id first
                        $url = explode('/', $move['move']['url']);
                        $url = $url[6];
                        $fireRedLeafGreen = array_merge($fireRedLeafGreen, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $url
                        )));
                    break;
                    // pokemon emerald
                    case "emerald":
                        // get move url id first
                        $url = explode('/', $move['move']['url']);
                        $url = $url[6];
                        $emerald = array_merge($emerald, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $url
                        )));
                    break;
                    //  pokemon diamond and pearl
                    case "diamond-pearl":
                        // get move url id first
                        $url = explode('/', $move['move']['url']);
                        $url = $url[6];
                        $diamondPearl = array_merge($diamondPearl, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $url
                        )));
                    break;
                    // pokemon platinum
                    case "platinum":
                        // get move url id first
                        $url = explode('/', $move['move']['url']);
                        $url = $url[6];
                        $platinum = array_merge($platinum, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $url
                        )));
                    break;
                    // pokemon hearthgold and soulsilver
                    case "heartgold-soulsilver":
                        // get move url id first
                        $url = explode('/', $move['move']['url']);
                        $url = $url[6];
                        $hearthgoldSoulsivler = array_merge($hearthgoldSoulsivler, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $url
                        )));
                    break;
                    //  pokemon black and white
                    case "black-white":
                        // get move url id first
                        $url = explode('/', $move['move']['url']);
                        $url = $url[6];
                        $blackWhite = array_merge($blackWhite, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $url
                        )));
                    break;
                    //  pokemon black and white 2
                    case "black-2-white-2":
                        // get move url id first
                        $url = explode('/', $move['move']['url']);
                        $url = $url[6];
                        $blackWhite2 = array_merge($blackWhite2, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $url
                        )));
                    break;
                    // pokemon x and y
                    case "x-y":
                        // get move url id first
                        $url = explode('/', $move['move']['url']);
                        $url = $url[6];
                        $xy = array_merge($xy, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $url
                        )));
                    break;
                    //  pokemon omega ruby and alpha saphire
                    case "omega-ruby-alpha-sapphire":
                        // get move url id first
                        $url = explode('/', $move['move']['url']);
                        $url = $url[6];
                        $omegaAlpha = array_merge($omegaAlpha, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $url
                        )));
                    break;
                    // pokemon moon and sun
                    case "sun-moon":
                        // get move url id first
                        $url = explode('/', $move['move']['url']);
                        $url = $url[6];
                        $sunMoon = array_merge($sunMoon, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $url
                        )));
                    break;
                    // pokemon ultra moon and sun
                    case "ultra-sun-ultra-moon":
                        // get move url id first
                        $url = explode('/', $move['move']['url']);
                        $url = $url[6];
                        $ultraSunMoon = array_merge($ultraSunMoon, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $url
                        )));
                    break;
                }
            }
        }
        // usort all the arrays

        // red blue
        usort($redBlue, function ($item1, $item2) {
            return $item1['level_learned_at'] <=> $item2['level_learned_at'];
        });
        // yellow
        usort($yellow, function ($item1, $item2) {
            return $item1['level_learned_at'] <=> $item2['level_learned_at'];
        });
        // gold silver
        usort($goldSilver, function ($item1, $item2) {
            return $item1['level_learned_at'] <=> $item2['level_learned_at'];
        });
        // crystal
        usort($crystal, function ($item1, $item2) {
            return $item1['level_learned_at'] <=> $item2['level_learned_at'];
        });
        // ruby saphire
        usort($rubySaphire, function ($item1, $item2) {
            return $item1['level_learned_at'] <=> $item2['level_learned_at'];
        });
        // emerald
        usort($emerald, function ($item1, $item2) {
            return $item1['level_learned_at'] <=> $item2['level_learned_at'];
        });
        // leafgreen firered
        usort($fireRedLeafGreen, function ($item1, $item2) {
            return $item1['level_learned_at'] <=> $item2['level_learned_at'];
        });
        // diamond pearl
        usort($diamondPearl, function ($item1, $item2) {
            return $item1['level_learned_at'] <=> $item2['level_learned_at'];
        });
        // platinum
        usort($platinum, function ($item1, $item2) {
            return $item1['level_learned_at'] <=> $item2['level_learned_at'];
        });
        // hearhgold soulsiver
        usort($hearthgoldSoulsivler, function ($item1, $item2) {
            return $item1['level_learned_at'] <=> $item2['level_learned_at'];
        });
        // black and white
        usort($blackWhite, function ($item1, $item2) {
            return $item1['level_learned_at'] <=> $item2['level_learned_at'];
        });
        // black and white 2
        usort($blackWhite2, function ($item1, $item2) {
            return $item1['level_learned_at'] <=> $item2['level_learned_at'];
        });
        // x & y
        usort($xy, function ($item1, $item2) {
            return $item1['level_learned_at'] <=> $item2['level_learned_at'];
        });
        // omega ruby alpha saphire
        usort($omegaAlpha, function ($item1, $item2) {
            return $item1['level_learned_at'] <=> $item2['level_learned_at'];
        });
        // sun moon 
        usort($sunMoon, function ($item1, $item2) {
            return $item1['level_learned_at'] <=> $item2['level_learned_at'];
        });
        // ultra sun moon
        usort($ultraSunMoon, function ($item1, $item2) {
            return $item1['level_learned_at'] <=> $item2['level_learned_at'];
        });
        // return the data to view
        return view('pokemon', compact(
            'name',
            'abilities', 
            'redBlue', 
            'yellow', 
            'goldSilver', 
            'crystal', 
            'rubySaphire', 
            'emerald', 
            'fireRedLeafGreen', 
            'diamondPearl', 
            'platinum', 
            'hearthgoldSoulsivler', 
            'blackWhite', 
            'blackWhite2', 
            'xy', 
            'omegaAlpha', 
            'sunMoon', 
            'ultraSunMoon', 
            'dexNumber', 
            'stats', 
            'types', 
            'weight', 
            'sprites',
            'icon'));
    }

    // get pokemon move data
    public function moveData($id) {
        //retrieve data from api
        $id = htmlspecialchars($id);
        try {
            $pokemon = file_get_contents('https://pokeapi.co/api/v2/move/'.$id);
            $moveData = json_decode($pokemon, true);
        } catch (Exception $e) {
            abort(404);
        }
        // create variables
        $accuracy = $moveData['accuracy'];
        $damageClass = $moveData['damage_class']['name'];
        $moveText = $moveData['effect_entries'][0]['effect'];
        // strip $chance_effect from the move text variable
        $moveText = str_replace("$", "x", $moveText);
        $moveText = str_replace("effect_chance%", "%", $moveText);
        $learnedBy = $moveData['learned_by_pokemon'];
        $name = $moveData['name'];
        $power = $moveData['power'];
        $pp = $moveData['pp'];
        $priority = $moveData['priority'];
        $type = $moveData['type']['name'];
        if ($power === null) {
            $power = '-';
        }
        if ($accuracy === null) {
            $accuracy = '-';
        }
        return view('moves', compact(
            'accuracy',
            'damageClass',
            'moveText',
            'learnedBy',
            'name',
            'power',
            'pp',
            'priority',
            'type',
            'id',
        ));
    }
}
