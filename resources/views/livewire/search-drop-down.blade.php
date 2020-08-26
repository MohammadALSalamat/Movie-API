<div>
    <div class="relative" x-data="{ isOpen:true}" @click.away=" isOpen = false">
        <input @keydown.escape.window=" isOpen=false" @focus=" isOpen=true" @keydown.shift.tab="isOpen=false"
            type="text" wire:model.debounce.500ms="search"
            class=" bg-gray-800 rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline"
            placeholder="Search....">
        <div class="absolute top-0 mt-1 ml-2">
            <i class="fa fa-search fill-current w-4 " aria-hidden="true"></i>
        </div>
        <!-- Add the spinner of tailwind  -->
        <div wire:loading class="  spinner top-0 right-0 mr-4 mt-3"></div>
    </div>

    @if (strlen($search) > 2)
    <div class=" z-50 absolute bg-gray-800 text-sm rounded w-64 mt-4" x-show=" isOpen">
        @if ($newsearchMovie->count() > 0)
        <ul>
            @foreach ($newsearchMovie as $result)
            <li @if($loop->last)
                @keydown.tab = "isOpen=false"
                @endif
                class="border-b border-gray-700">
                <a href="{{ route('showmovie.show' , $result['id']) }}"
                    class=" hover:bg-gray-700 px-3 py-3 flex items-center">
                    <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt=" poster" class="w-8">
                    <span class=" ml-4">{{ $result['title'] }}</span></a>
            </li>
            @endforeach

        </ul>
        @else
        <div class="px-3 py-3"> No Result For "{{ $search }}"</div>
        @endif
    </div>

    @endif
</div>
