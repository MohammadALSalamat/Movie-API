
<div class="mt-8">
    <a href="{{route('Show',$tvshow['id'])}}">
        <img src="{{ $tvshow['poster_path'] }}" alt="{{ $tvshow['name'] }}"
            class="img hover:opacity-75">
    </a>
    <div class="mt-2">
        <a href="{{ route('Show',$tvshow['id']) }}" class=" text-lg mt-2 hover:text-gray-300">
            {{ $tvshow['name'] }}
        </a>
        <div class="flex items-center text-gray-500 text-sm mt-2">
            <span> <i class="fa fa-star" style="color: yellow" aria-hidden="true"></i> </span>
            <span class="ml-2"> {{ $tvshow['vote_average'] }} </span>
            <span class="mx-2"> | </span>
            <span> {{ $tvshow['first_air_date'] }} </span>
        </div>
        <div class="text-gray-500 text-sm mt-1">
            {{ $tvshow['genres'] }}
        </div>
    </div>
</div>

