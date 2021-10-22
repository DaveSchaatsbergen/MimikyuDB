<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //Search up pokemon from pokeAPI
    public function searchPokemon() {
        $id = htmlspecialchars($_POST['pokemonName']);
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
                        $redBlue = array_merge($redBlue, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $move['move']['url']
                        )));
                    break;
                    // pokemon Yellow
                    case "yellow":
                        $yellow = array_merge($yellow, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $move['move']['url']
                        )));
                    break;
                    // pokemon gold and silver
                    case "gold-silver":
                        $goldSilver = array_merge($goldSilver, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $move['move']['url']
                        )));
                    break;
                    // pokemon crystal
                    case "crystal":
                        $crystal = array_merge($crystal, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $move['move']['url']
                        )));
                    break;
                    // pokemon ruby and saphire
                    case "ruby-sapphire":
                        $rubySaphire = array_merge($rubySaphire, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $move['move']['url']
                        )));
                    break;
                    // pokemon fire red and leaf green
                    case "firered-leafgreen":
                        $fireRedLeafGreen = array_merge($fireRedLeafGreen, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $move['move']['url']
                        )));
                    break;
                    // pokemon emerald
                    case "emerald":
                        $emerald = array_merge($emerald, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $move['move']['url']
                        )));
                    break;
                    //  pokemon diamond and pearl
                    case "diamond-pearl":
                        $diamondPearl = array_merge($diamondPearl, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $move['move']['url']
                        )));
                    break;
                    // pokemon platinum
                    case "platinum":
                        $platinum = array_merge($platinum, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $move['move']['url']
                        )));
                    break;
                    // pokemon hearthgold and soulsilver
                    case "heartgold-soulsilver":
                        $hearthgoldSoulsivler = array_merge($hearthgoldSoulsivler, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $move['move']['url']
                        )));
                    break;
                    //  pokemon black and white
                    case "black-white":
                        $blackWhite = array_merge($blackWhite, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $move['move']['url']
                        )));
                    break;
                    //  pokemon black and white 2
                    case "black-2-white-2":
                        $blackWhite2 = array_merge($blackWhite2, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $move['move']['url']
                        )));
                    break;
                    // pokemon x and y
                    case "x-y":
                        $xy = array_merge($xy, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $move['move']['url']
                        )));
                    break;
                    //  pokemon omega ruby and alpha saphire
                    case "omega-ruby-alpha-sapphire":
                        $omegaAlpha = array_merge($omegaAlpha, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $move['move']['url']
                        )));
                    break;
                    // pokemon moon and sun
                    case "sun-moon":
                        $sunMoon = array_merge($sunMoon, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $move['move']['url']
                        )));
                    break;
                    // pokemon ultra moon and sun
                    case "ultra-sun-ultra-moon":
                        $ultraSunMoon = array_merge($ultraSunMoon, array(array(
                            "level_learned_at"=>$move_detail['level_learned_at'], 
                            "move_name"=>$move['move']['name'], 
                            "game"=> $move_detail['version_group']['name'], 
                            "method"=> $move_detail['move_learn_method']['name'],
                            "url" => $move['move']['url']
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
}
