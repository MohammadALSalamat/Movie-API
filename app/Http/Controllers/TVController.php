<?php

namespace App\Http\Controllers;

use App\ViewModels\TVShowModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TVController extends Controller
{
    public function Tvindex(){

        // this line use to get the API info and we have to deal with the config file
        $popularTV= Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/tv/popular")
            ->json()['results'];


        $Genres  = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/genre/tv/list")
            ->json()['genres'];

        $TopRatedTV= Http::withToken(config('services.tmdb.token'))
        ->get("https://api.themoviedb.org/3/tv/top_rated")
        ->json()['results'];

        $viewModel = new TVShowModel(
            $popularTV,
            $Genres,
            $TopRatedTV);

        return view('Front-end.Tv-show',$viewModel);
    }

    public function TvShow($id){
        $movie = Http::withToken(config('services.tmdb.token'))
        ->get("https://api.themoviedb.org/3/tv/".$id."?append_to_response=credits,images,videos")
        ->json();
        return view('Front-end.singleTvShow', compact('movie'));
    }
}
