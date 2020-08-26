<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Movie_card extends Component

{
    // make a public variables
    public $movie;
    public $genres;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($movie , $genres)
    {
        // accept the variables
        $this->movie = $movie;
        $this->genres = $genres;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.movie_card');
    }
}
