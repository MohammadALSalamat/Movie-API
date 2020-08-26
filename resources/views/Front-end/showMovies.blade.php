@extends('layouts.FrontEnd-layout.main')
@section('content')
<!-- Start The Movie info-->
<div class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
        <img src="{{ asset('http://image.tmdb.org/t/p/w300/'.$movie['poster_path']) }}" alt="{{ $movie['title'] }}">
        <div class="md:ml-24">
            <h2 class="text-4xl font-semibold"> {{ $movie['title']}}</h2>
            <div class="flex flex-wrap items-center text-gray-500 text-sm mt-1">
                <span> <i class="fa fa-star" style="color: yellow" aria-hidden="true"></i> </span>
                <span class="ml-2"> {{ $movie['vote_average'] * 10 ."%" }} </span>
                <span class="mx-2"> | </span>
                <span> {{ $movie['release_date'] }}</span>
                <span class="mx-2"> | </span>
                <span>
                    @foreach ($movie['genres'] as $genre )
                    {{ $genre['name'] }}@if(!$loop->last),@endif
                    @endforeach
                </span>
            </div>
            <div class="text-gray-600 text-sm mt-4 w-50 justify-content-end" style="width: 100%">
                <p>{{ $movie['overview'] }}</p>
            </div>
            <div class="mt-12">
                <h4 class=" text-white font-semibold"> Featured Crew</h4>
                <div class="flex mt-4">

                    @foreach ($movie['credits']['crew'] as $crew )
                    @if ($loop->index < 2) <div class="mr-8">
                        <div>{{ $crew['name'] }}</div>
                        <div class=" text-sm text-gray-300">{{ $crew['job'] }}</div>
                </div>
                @endif
                @endforeach

            </div>
        </div>
        <div x-data="{isOpen:false}">
            @if (count($movie['videos']['results']) > 0)

            <div>
                <a class="tip-top" data-original-title="Update"><button type="submit" @click=" isOpen = true"
                        class="btn btn-warning hvr-sweep-left px-5 py-4 mt-5 text-gray-400 transition ease-in-out duration-150"><i
                            class="fa fa-play mr-1"></i> Play Trailer</button></a> </td>
            </div>
            @endif
            <!-- Show model to toggle a video once you click on the button Play Trailer-->
            <div x-show="isOpen" style=" background:rgba(0 ,0 ,0 ,.5) ;"
                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
                <div class=" container max-auto lg:px-32 rounded-lg overflow-y-auto">
                    <div class=" bg-gray-900 rounded">
                        <div class="flex justify-end pr-4 pt-2">
                            <button @click=" isOpen = false"
                                class="text:3xl leading-none hover:text-gray-300">&times;</button>
                        </div>
                        <div class="model-body px-8 py-8">
                            <div width="560" height="315" class="relative overflow-hidden responsive-container"
                                style="padding-top:56.25%">
                                <iframe class="responsive-iframe absolute w-full h-full top-0 left-0" allowfullscreen
                                    style="border:0" allow="encrypted-media; autoplay"
                                    src="http://youtube.com/embed/{{$movie['videos']['results'][0]['key']}}">
                                </iframe>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
</div>

<!-- End The Movie info-->
<!-- Start related of Anime --->
<style>
    .img {
        height: 300px !important;
        width: 100%
    }
</style>

<div class="container mx-auto px-4 pt-16">
    <div class="related-Animes">
        <h2 class=" uppercase text-orange-500 tracking-wider text-lg font-semibold">Casts</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-5 gap-8">
            @foreach ($movie['credits']['cast'] as $item)
            @if ($loop->index < 5) <div class="mt-8">
                <a href="{{ route('actors.show',$item['id']) }}">
                    <img src="{{ asset('http://image.tmdb.org/t/p/w300/'.$item['profile_path']) }}"
                        alt="{{ $item['name'] }}" class="img hover:opacity-75">
                </a>
                <div class="mt-2">
                    <a href="{{ route('actors.show',$item['id']) }}" class=" text-lg mt-2 hover:text-gray-300">
                        {{ $item['name'] }}
                    </a>
                    <div class="flex items-center text-gray-500 text-sm mt-2">
                        {{ $item['character'] }}
                    </div>
                </div>

        </div>
        @endif
        @endforeach
    </div>
</div>

</div>
<!-- End related of Anime --->
<!-- Start Images of Anime --->
<style>
    .img {
        height: 300px !important;
        width: 100%
    }

    .images-Animes {
        margin-bottom: 50px;
    }
</style>

<div class="container mx-auto px-4 pt-16" x-data="{isOpen : false ,image : ''}">
    <div class="images-Animes">
        <h2 class=" uppercase text-orange-500 tracking-wider text-lg font-semibold">Images Of the Movie</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-3 gap-8">
            @foreach ($movie['images']['backdrops'] as $item)
            @if ($loop ->index < 9 ) <div class="mt-8">
                <a @click.prevent=" isOpen = true
                    image ='{{ 'http://image.tmdb.org/t/p/original/'.$item['file_path'] }}'" href="#">
                    <img src="{{ 'http://image.tmdb.org/t/p/w300/'.$item['file_path'] }}" class="img hover:opacity-75">
                </a>

        </div>
        @endif
        @endforeach
    </div>
    <!-- Show model to toggle a video once you click on the button Play Trailer-->
    <div x-show="isOpen" style=" background:rgba(0 ,0 ,0 ,.5) ;"
        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
        <div class=" container max-auto lg:px-32 rounded-lg overflow-y-auto">
            <div class=" bg-gray-900 rounded">
                <div class="flex justify-end pr-4 pt-2">
                    <button @click=" isOpen = false" @keydown.escape.window=" isOpen = false" class="text:3xl leading-none hover:text-gray-300">&times;</button>
                </div>
                <div class="model-body px-8 py-8">
                    <div width="560" height="315" class="relative overflow-hidden responsive-container"
                        >
                        <img :src="image">
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
<!-- End Images of Anime --->
@endsection
