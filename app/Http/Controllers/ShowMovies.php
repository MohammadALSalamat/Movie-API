<?php

namespace App\Http\Controllers ;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ShowMovies extends Controller
{
    //start showing the movies
    function popular()
    {
        // this line use to get the API info and we have to deal with the config file
        $APIpopular = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/movie/popular")
            ->json()['results'];


        $APIGenres = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/genre/movie/list")
            ->json()['genres'];

        $APIPlayingMovies = Http::withToken(config('services.tmdb.token'))
        ->get("https://api.themoviedb.org/3/movie/now_playing")
        ->json()['results'];

        // make array to collect the items from the genre
        $genres = collect ( $APIGenres )-> mapWithKeys( function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
        // dump($APIpopular);
        return view('Front-end.index', compact('APIpopular', 'genres','APIPlayingMovies'));
    }

    public function singleMovie($id){
        $movie = Http::withToken(config('services.tmdb.token'))
        ->get("https://api.themoviedb.org/3/movie/".$id."?append_to_response=credits,images,videos")
        ->json();
        // dump($movie);
        return view('Front-end.showMovies' ,compact('movie'));
    }
}
