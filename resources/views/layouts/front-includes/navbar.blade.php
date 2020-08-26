<style>
.nav:hover{
    border-left: 3px solid orange;
    padding-left:10px
}
nav{
    background: #010409;
}
</style>
<nav class="border-b border-gray-800">
    <div class="container flex justify-between flext flex-col md:flex-row max-auto items-center px-4 py-6">
        <ul class="flex flex-col md:flex-row mt-3 md:mt-0 items-center">
            <li>
                <a href="{{url('/')}}"> <img src="{{asset('images/front-images/fox1.jpg') }}" width="100px" class=" img-responsive img-rounded" alt="Anime"></a>
            </li>
            <li class=" nav md:ml-16 mt-3 md:mt-0 ">
                <a href="{{route('indexmovie')}}" class=" hover:text-gray-300"> Movies</a>
            </li>
            <li class=" nav md:ml-6 mt-3 md:mt-0 ">
                <a href="{{ route('TV') }}" class=" hover:text-gray-300"> Tv Shows</a>
            </li>
            <li class=" nav md:ml-6 mt-3 md:mt-0 ">
                <a href="{{ route('actors') }}" class=" hover:text-gray-300"> Actors</a>
            </li>
        </ul>
        <div class=" flex  md:flex-row mt-3 md:mt-0 items-center">
            <!-- get the livewire compontent fron its file  -->
        <livewire:search-drop-down></livewire:search-drop-down>
        </div>
        <!-- insert the live wire from component-->
    </div>

</nav>

