<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropDown extends Component
{
    // make a public search var to get the result from the search button in view
    public $search = "";
    public function render()
    {
        // grap the results from the api movies just the same way of doing the populare movies
        $searchMovie = [];

        if (strlen($this->search) > 2) {
            $searchMovie = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/search/movie?query= ".$this->search)
            ->json()['results'];
        }
        // get just a specific number of results
        $newsearchMovie =collect($searchMovie)->take(7);
        return view('livewire.search-drop-down' ,compact('newsearchMovie'));
    }
}
