@extends('layouts.app')

@section('content')
    {{-- Carousel --}}
    @include('partials.carousel')

    <div class="my-20">
        <h1 class="text-color font-bold mb-7 text-3xl uppercase">Popular Movies</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3">

            @foreach ($popularMovies as $movie)
                <x-movie-card :movie="$movie" />
            @endforeach

        </div>
    </div>

    <div class="my-20">
        <h1 class="text-color font-bold mb-7 text-3xl uppercase">Now Playing</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3">

            @foreach ($nowPlayingMovies as $movie)
                <x-movie-card :movie="$movie" />
            @endforeach

        </div>
    </div>

    <div class="my-20">
        <h1 class="text-color font-bold mb-7 text-3xl uppercase">Top Rated Movies</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3">

            @foreach ($topRatedMovies as $movie)
                <x-movie-card :movie="$movie" />
            @endforeach

        </div>
    </div>
@endsection
