
<div class="mt-8">
    <a href="{{url('/Movie/'.$movie['id'] )}}">
        <img src="{{ asset('http://image.tmdb.org/t/p/w500/'.$movie['poster_path']) }}" alt="{{ $movie['title'] }}"
            class="img hover:opacity-75">
    </a>
    <div class="mt-2">
        <a href="{{ route('showmovie.show',$movie['id']) }}" class=" text-lg mt-2 hover:text-gray-300">
            {{ $movie['title'] }}
        </a>
        <div class="flex items-center text-gray-500 text-sm mt-2">
            <span> <i class="fa fa-star" style="color: yellow" aria-hidden="true"></i> </span>
            <span class="ml-2"> {{ $movie['vote_average'] * 10 ."%" }} </span>
            <span class="mx-2"> | </span>
            <span> {{ $movie['release_date'] }} </span>
        </div>
        <div class="text-gray-500 text-sm mt-1">
            @foreach ($movie['genre_ids'] as $genre)
            {{-- {{ $genres->get($genre) }}@if(!$loop->last),@endif --}}
            @endforeach
        </div>
    </div>
</div>

