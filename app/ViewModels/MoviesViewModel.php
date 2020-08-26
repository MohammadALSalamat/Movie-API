<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    // make the var publice
    public $APIpopularActors;
    public $page;

    public function __construct($APIpopularActors , $page)
    {
        // create model to handele the view varibales
        $this-> APIpopularActors =$APIpopularActors;
        $this-> page =$page;
    }

    public function APIpopularActors(){
        // start looping through the data to get a cleen code . this way is to short the code
        return collect($this->APIpopularActors)->map(function($actor){
            return collect($actor)->merge([
                'profile_path'=> $actor['profile_path']? 'https://image.tmdb.org/t/p/w235_and_h235_face'.$actor['profile_path'] : 'https://ui.avatars.com/api/?size=235&name='.$actor['profile_path'],

                // get array inside array and mix both arraies
                'known_for'=> collect($actor['known_for'])->where('media_type' ,'movie')->pluck('title')->union(
                    collect($actor['known_for'])->where('media_type' ,'tv')->pluck('name')
                )->implode(', '),
            ]);
        });

    }

    // pagination functoins
    public function Prev(){
        return $this->page > 1 ? $this->page -1 : null ;

    }

    public function Next(){
        return $this->page < 500 ? $this->page + 1 : null ;

    }
}
