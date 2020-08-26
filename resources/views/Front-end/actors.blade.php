@extends('layouts.FrontEnd-layout.main')
@section('content')
<style>
    .img {
        height: 300px !important;
        width: 100%
    }
</style>
<!-- Start the Actors-->

<div class="container mx-auto px-4 pt-16 py-16">
    <div class="popular-actors">
        <h2 class=" uppercase text-orange-500 tracking-wider text-lg font-semibold"> Popular Actors</h2>
        <div class="grid grid-cols-1 items-center sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-5 gap-8">
            @foreach ($APIpopularActors as $actor)
            <div class="actor mt-8">
                <a href="{{ url('actors/'.$actor['id']) }}">
                    <img src="{{ $actor['profile_path'] }}" alt="{{ $actor['name'] }}"
                        class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="mt-2">
                    <a href="" class="text-lg hover:text-gray-300"> {{ $actor['name'] }}</a>
                    <div class="text-sm truncate text-gray-400"> {{ $actor['known_for'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- javascript status for pagintion -->
    <div class="page-load-status my-8">
        <div class=" flex justify-center">
            <p class="infinite-scroll-request spinner my-8 text-4xl">&nbsp;</p>
        </div>
        <p class="infinite-scroll-last">End of content</p>
        <div class=" flex justify-center text-orange-600 mt-16">
            <p class="infinite-scroll-error">The End Of Contents </p>
        </div>
    </div>

    <!-- pagition option using buttons but down also have pagition javascript packge. use any -->

    {{-- <div class="justify-between mt-16 flex">
        @if ($Prev)
        <a href=" /Actors/page/{{ $Prev }} "> <button type="button"
        class="btn btn-warning hvr-sweep-left px-5 py-4 mt-5 text-gray-400 transition ease-in-out duration-150"><i
            class=" fa fa-backward pr-1"></i> Prev</button></a>
    @else
    <a href="#"> <button type="button" class="btn btn-warning bg-orange-200 px-5 py-4 mt-5 text-gray-400 "
            style="cursor: not-allowed" disabled><i class=" fa fa-backward pr-1"></i> Prev</button></a>
    @endif

    @if ($Next)
    <a href=" /Actors/page/{{ $Next }} "> <button type="button"
            class="btn btn-warning hvr-sweep-right px-5 py-4 mt-5 text-gray-400 transition ease-in-out duration-150">
            Next <i class=" fa fa-forward pl-1"></i></button></a>
    @else
    <a href="#"> <button type="button" class="btn btn-warning bg-orange-200 px-5 py-4 mt-5 text-gray-400 "
            style="cursor: not-allowed" disabled><i class=" fa fa-backward pr-1"></i> Next</button></a>
    @endif
</div>
</div> --}}
<!-- End the Actors-->
@endsection

<!-- Add special scripts to main page this is one of paginations packages-->
@section('scripts')
<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>

<script>
    // Initialize with vanilla JavaScript
    var elem = document.querySelector('.grid');
    var infScroll = new InfiniteScroll(elem, {
        // options
        path: '/Actors/page/@{{#}}',
        append: '.actor',
        status: '.page-load-status'
    });
</script>

@endsection
