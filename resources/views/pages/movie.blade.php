@extends('layouts.app')

@section('content')
    <div class="mb-20">
        <div class="flex">
            <img class="max-w-lg rounded-lg max-h-[600px]" src="{{ $movie['poster_path'] }}" alt="">
            <div class="ml-20">
                <h1 class="font-bold text-color text-3xl">{{ $movie['title'] }}</h1>
                <div class="flex mt-2 text-white font-semibold">
                    <div class="flex items-center">
                        <svg class="text-yellow-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>
                        <p class="mx-2">{{ $movie['vote_average'] }}</p>
                    </div>
                    <span>|</span>
                    <p class="mx-2">{{ $movie['release_date'] }}</p>
                    <span>|</span>
                    <p class="ml-2">
                        {{ $movie['genres'] }}
                    </p>
                </div>
                <div class="text-white text-md mt-5">{{ $movie['overview'] }}</div>
                <div class="mt-10 text-white">
                    <h2 class="text-color text-lg font-bold">Featured Crew</h2>
                    <div class="flex mt-3">
                        @foreach ($movie['crew'] as $crew)
                            <div class="mr-5">
                                <h4 class="font-semibold">{{ $crew['name'] }}</h4>
                                <p class="font-normal text-sm">{{ $crew['job'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mt-10 inline-block">
                    @if (count($movie['videos']['results']) > 0)
                        {{-- https://youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }} --}}
                        <button type="button" data-modal-toggle="defaultModal"
                            class="text-white button-color hover:bg-[#ECB365]/75 flex items-center focus:outline-none focus:ring-4 focus:ring-[#ECB365]/30 font-semibold rounded-full text-lg px-6 py-3 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                            <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-play-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z" />
                            </svg>
                            Play Trailer</button>
                    @endif

                    @include('partials.modal-detail')
                </div>
            </div>
        </div>

        <hr class="my-16">

        <div class="">
            <h1 class="font-bold text-3xl mb-5 text-color">Cast</h1>
            <div class="grid grid-cols-5 gap-3">
                @foreach ($movie['cast'] as $cast)
                    <div>
                        <img width="200" height="300" class="rounded duration-200 hover:opacity-60 mb-6"
                            src="{{ 'https://image.tmdb.org/t/p/w300/' . $cast['profile_path'] }}" alt="">
                        <h3 class="font-semibold text-white text-lg mt-3">{{ $cast['name'] }}</h3>
                        <p class="text-white text-sm">{{ $cast['character'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
