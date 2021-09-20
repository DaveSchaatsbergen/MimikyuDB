<?php

namespace App\Http\Controllers;

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
            echo $e->getMessage();
            return view('Home');
        }
        // usort allows sorting by custom attribute
        usort(
            $pokemon_data['moves'],
            function($a,$b){ return $a['version_group_details']['level_learned_at'] < $b['version_group_details']['level_learned_at'] ? -1 : 1;}
        );
        // gathering all pokemon data
        $name = $pokemon_data['name'];
        $abilities = $pokemon_data['abilities'];
        $moves = $pokemon_data['moves'];
        $dexNumber = $pokemon_data['id'];
        $stats = $pokemon_data['stats'];
        $types = $pokemon_data['types'];
        $weight = $pokemon_data['weight'];
        $sprite = $pokemon_data['sprites'];
        return view('pokemon', compact('name', 'abilities', 'moves', 'dexNumber', 'stats', 'types', 'weight', 'sprite'));
    }
}
