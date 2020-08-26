<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TVShowModel extends ViewModel
{
    public $popularTV;
    public $Genres;
    public $TopRatedTV;

    public function __construct($popularTV , $Genres , $TopRatedTV)
    {
        $this->popularTV = $popularTV;
        $this->Genres = $Genres;
        $this->TopRatedTV= $TopRatedTV;

    }
    public function popularTV(){
        return $this->formatTv($this->popularTV);
    }

    public function TopRatedTV(){
        return $this->formatTv($this->TopRatedTV);
    }
    public function Genres(){
        return collect($this->Genres)->mapWithKeys(function($genre){
            return [$genre['id']=> $genre['name']];
        });
    }

    private function formatTv($tv){
        // return collect($tv)->map(function($tvshow){
        //     return $tvshow;
        // })->dump();

        return collect($tv)->map(function($tvshow){
            $genreFormat = collect($tvshow['genre_ids'])->mapWithKeys(function($value){
                return [$value =>$this->Genres()->get($value)];
            })->implode(', ');

        return collect($tvshow)->merge([
            'poster_path' =>'http://image.tmdb.org/t/p/w500'.$tvshow['poster_path'],
            'vote_average' =>$tvshow['vote_average'] * 10 .'%',
            'genres' => $genreFormat,
            'first_air_date' =>Carbon::parse($tvshow['first_air_date'])->format('M d,Y')
        ]);
    });
}
}

