@extends('layouts.FrontEnd-layout.main')
@section('content')
<!-- Start The Movie info-->
<div class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
        <div class="flex-none">
            <img src="{{ $Actorsdetailes['profile_path'] }}" alt="{{ $Actorsdetailes['name'] }}">
            <ul class="mt-4 flex items-center">
                @if ($Actorsdetailes['homepage'])
                <li>
                    <a href="{{ $Actorsdetailes['homepage'] }}" target="_blank" title="Website Account"
                        class="hover:text-teal-300"> <i class="fa fa-globe fa-2x" aria-hidden="true"></i></a>
                </li>
                @endif
                @if ($actorSocial['twitter'])
                <li>
                    <a href="{{ $actorSocial['twitter'] }}" target="_blank" title="Twitter Account"
                        class="hover:text-blue-500"> <i class="fa fa-twitter fa-2x ml-3" aria-hidden="true"></i></a>
                </li>
                @endif
                @if ($actorSocial['facebook'])
                <li>
                    <a href="{{ $actorSocial['facebook'] }}" target="_blank" title="Facebook Account"
                        class="hover:text-blue-900"> <i class="fa fa-facebook-official fa-2x ml-3"
                            aria-hidden="true"></i></a>
                </li>
                @endif
                @if ($actorSocial['instagram'])
                <li>
                    <a href="{{ $actorSocial['instagram'] }}" target="_blank" title="Instagram Account"
                        class="hover:text-red-600"> <i class="fa fa-instagram fa-2x ml-3 " aria-hidden="true"></i></a>
                </li>
                @endif
            </ul>
        </div>
        <div class="md:ml-24">
            <h2 class="text-4xl font-semibold"> {{ $Actorsdetailes['name'] }}</h2>
            <div class="flex flex-wrap items-center text-gray-500 text-sm mt-1">
                <span> <i class="fa fa-birthday-cake fa-lg" style="color:pink" aria-hidden="true"></i> </span>
                <span class="ml-2 mt-2"> {{ $Actorsdetailes["birthday"] }} ( {{ $Actorsdetailes['age'] }} Years Old
                    )</span>
                <span class="mx-2 mt-2"> In </span>
                <span class="mt-2"> {{ $Actorsdetailes["place_of_birth"]  }}</span>
            </div>
            <div class="text-gray-600 text-sm mt-4 w-50 justify-content-end" style="width: 100%">
                <p>{{ $Actorsdetailes["biography"]  }}</p>
                <h4 class=" font-semibold mt-12 "> Known For </h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
                    @foreach ($knownForTitle as $credit)
                        <div class="mt-4">
                        <a href="{{ route('showmovie.show' ,$credit['id']) }}"> <img src="{{ $credit['poster_path'] }}" alt=""></a>
                        <a href = "" class=" text-sm leading-normal block text-gray-300 hover:text-white mt-1">
                            {{ $credit['title'] }}
                        </a>
                    </div>
                        @endforeach
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
    <div class="Credits">
        <h2 class=" uppercase text-orange-500 tracking-wider text-lg font-semibold">Credits</h2>
        @foreach ($credits as $item)
            <li>{{ $item['release_year'] }} &middot; <strong>{{ $item['title'] }}</strong> <span class="text-orange-600">As {{ $item['character'] }}</span></li>
        @endforeach
    </div>
</div>
@endsection
