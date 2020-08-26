<?php

namespace App\Http\Controllers;

use App\ViewModels\ActorDetails;
use App\ViewModels\MoviesViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Actors extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 1)
    {
        // this line use to get the API info and we have to deal with the config file
        $APIpopularActors = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/person/popular?page=".$page)
            ->json()['results'];

        //work with view model insteat of grap the info here.

        $viewModel = new MoviesViewModel($APIpopularActors , $page);

        return view('Front-end.actors',$viewModel);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // show the actors single page using their id
        $Actorsdetailes = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/person/".$id)
            ->json();

        $actorSocial = Http::withToken(config('services.tmdb.token'))
        ->get("https://api.themoviedb.org/3/person/".$id."/external_ids")
        ->json();

        $credits = Http::withToken(config('services.tmdb.token'))
        ->get("https://api.themoviedb.org/3/person/".$id."/combined_credits")
        ->json();
            $viewModel = new ActorDetails($Actorsdetailes ,$actorSocial ,$credits);
        return view('Front-end.Actors_single_page' ,  $viewModel);
    }

}
