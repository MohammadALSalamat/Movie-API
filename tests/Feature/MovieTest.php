<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class MovieTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    /** @test */
    public function Show_main_page_uncorrect_info()
    {
        // fake the responses
        Http::fake([
            // here we add the link that we want to fake with the fake response as following data
            'https://api.themoviedb.org/3/movie/popular' => $this->fakePopulareMovies(),
            'https://api.themoviedb.org/3/movie/now_playing'=>$this->fakePLAYMovies(),
        ]);

        $response = $this->get(route('indexmovie'));

        $response->assertSuccessful();
        $response->assertSee('Popular Movies');
        $response->assertSee('Fake Movie');
        $response->assertSee('Now Playing');
        $response->assertSee('Fake Playing Movies');
    }
    // create a methods to redisgin the code

    private function fakePopulareMovies()
    {
        return Http::response([
            'results' => [
                "popularity" => 73.386,
                "vote_count" => 10017,
                "video" => false,
                "poster_path" => "/xT98tLqatZPQApyRmlPL12Lti.jpg",
                "id" => 122917,
                "adult" => false,
                "backdrop_path" => "/bVmSXNgH1gpHYTDyF9Q826YwJ.jpg",
                "original_language" => "en",
                "original_title" => "Fake Movie",
                "genre_ids" =>  [
                    28,
                    12,
                    14,
                ],
                "title" => "fFake Movie",
                "vote_average" => 7.3,
                "overview" => "Fake Movie",
                "release_date" => "2014-12-10",
            ]
        ], 200);
    }
    private function fakePLAYMovies()
    {
        return Http::response([
            'results' => [
                "popularity" => 73.386,
                "vote_count" => 10017,
                "video" => false,
                "poster_path" => "/xT98tLqatZPQApyRmlPL12Lti.jpg",
                "id" => 122917,
                "adult" => false,
                "backdrop_path" => "/bVmSXNgH1gpHYTDyF9Q826YwJ.jpg",
                "original_language" => "en",
                "original_title" => "Fake Playing Movie",
                "genre_ids" =>  [
                    28,
                    12,
                    14,
                ],
                "title" => "Fake Playing Movie",
                "vote_average" => 7.3,
                "overview" => "Fake Movie",
                "release_date" => "2014-12-10",
            ]
        ], 200);
    }

}
