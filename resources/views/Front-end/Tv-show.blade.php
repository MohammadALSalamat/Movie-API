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
    <div class="popular-TV">
        <h2 class=" uppercase text-orange-500 tracking-wider text-lg font-semibold"> popular Shows</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-5 gap-8">
            @foreach ($popularTV as $tvshow)
            <!-- import the vue compontent to show the detalies -->
            <x-tv-card :tvshow="$tvshow"/>
            @endforeach
        </div>
    </div>
</div>
<!-- End the Popular Animes-->
<!-- Start the playing videos-->
<div class="container mx-auto px-4 pt-16">
    <div class="playing-Shows">
        <h2 class=" uppercase text-orange-500 tracking-wider text-lg font-semibold"> Most Watching Shows</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-5 gap-8">
            @foreach ($TopRatedTV as $tvshow)
            <!-- import the vue compontent to show the detalies -->
            <x-tv-card :tvshow="$tvshow"/>
            @endforeach
        </div>
    </div>
</div>
<!-- End the playing videos-->
@endsection

