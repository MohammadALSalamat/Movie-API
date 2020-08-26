<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class ActorDetails extends ViewModel
{
    public $Actorsdetailes;
    public $actorSocial;
    public $credits;
    public function __construct($Actorsdetailes ,$actorSocial,$credits)
    {
        // get the varibles
        $this->Actorsdetailes = $Actorsdetailes;
        $this->actorSocial = $actorSocial;
        $this->credits = $credits;
    }

    public function Actorsdetailes(){
        return collect($this-> Actorsdetailes )->merge([
            'profile_path'=> $this-> Actorsdetailes['profile_path']? 'https://image.tmdb.org/t/p/w300'.$this->Actorsdetailes['profile_path'] : 'https://ui.avatars.com/api/?size=235&name='.$this->Actorsdetailes['profile_path'],
            'birthday' => Carbon::parse($this-> Actorsdetailes['birthday'])->format('M d, Y'),
            'age' => Carbon::parse($this->Actorsdetailes['birthday'])->age,

        ]);
    }

    public function actorSocial(){
        return collect($this-> actorSocial )->merge([
            'twitter'=>$this->actorSocial['twitter_id'] ? 'http://twitter.com/'.$this->actorSocial['twitter_id']:null,
            'facebook'=>$this->actorSocial['facebook_id'] ? 'http://facebook.com/'.$this->actorSocial['facebook_id']:null,
            'instagram'=>$this->actorSocial['instagram_id'] ? 'http://instagram.com/'.$this->actorSocial['instagram_id']:null,

        ]);
    }

    public function knownForTitle(){
        $casttitle =  collect($this-> credits )->get('cast');

        return collect($casttitle)->where('media_type','movie')->sortByDesc('popularity')->take(5)->map(function($movie){
            return collect($movie)->merge([
                'poster_path' => $movie['poster_path']?'http://image.tmdb.org/t/p/w185'.$movie['poster_path']:'http://via.placeholder.com/185x278 ',
                'title'=> isset($movie['title'])?$movie['title']:'untitled'
            ]);
        });
    }

    public function credits(){
        $casttitle =  collect($this-> credits )->get('cast');

        return collect($casttitle)->map(function($movie){
            // cases if the relase date is not avalibal,
            if(isset($movie['release_date'])){
                $releasedate = $movie['release_date'];
            }elseif(isset($movie['first_air_date'])){
                $releasedate = $movie['first_air_date'];
            }else{
                $releasedate = '';

            }

             // cases if the title is not avalibal,
             if(isset($movie['title'])){
                $title = $movie['title'];
            }elseif(isset($movie['name'])){
                $title = $movie['name'];
            }else{
                $title = '';

            }
            return collect($movie)->merge([
                'release_date'=> $releasedate,
                'release_year'=>isset($releasedate)? Carbon::parse($releasedate)->format('Y'):'Future',
                'title' => $title,
                'character'=> isset($movie['character'])? $movie['character']:'',
            ]);
        })->sortByDesc('release_date');
    }
}
