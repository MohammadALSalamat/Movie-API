@extends('layouts.FrontEnd-layout.main')
@section('content')
<style>
    .img {
        height: 300px !important;
        width: 100%
    }
</style>

<!-- Start the Popular Animes-->
<div class="container mx-auto px-4 pt-16">
    <div class="popular-Animes">
        <h2 class=" uppercase text-orange-500 tracking-wider text-lg font-semibold"> popular Movies</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-5 gap-8">
            @foreach ($APIpopular as $movie)
            <!-- import the vue compontent to show the detalies -->
            <x-movie_card :movie="$movie" genres="$genres" />
            @endforeach
        </div>
    </div>
</div>
<!-- End the Popular Animes-->
<!-- Start the playing videos-->
<div class="container mx-auto px-4 pt-16">
    <div class="playing-Animes">
        <h2 class=" uppercase text-orange-500 tracking-wider text-lg font-semibold"> Most Watching Movies</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-5 gap-8">
            @foreach ($APIPlayingMovies as $movie)
            <!-- import the vue compontent to show the detalies -->
            <x-movie_card :movie="$movie" genres="$genres" />
            @endforeach
        </div>
    </div>

</div>
<!-- End the playing videos-->
@endsection
