@extends('layouts.app')

@section('content')
    <div class="my-16">
        <h1 class="text-color font-bold mb-7 text-3xl uppercase">Popular Actors</h1>
        <div class="container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 mb-12">

            @foreach ($popularActors as $actor)
                <div class="actor rounded-lg dark:bg-gray-800 dark:border-gray-700">
                    <a href="">
                        <img class="rounded-md duration-200 hover:opacity-60 hover:scale-105"
                            src="{{ $actor['profile_path'] }}" alt="">
                    </a>
                    <div class="p-3">
                        <a href="">
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-color dark:text-white">
                                {{ $actor['name'] }}</h5>
                        </a>
                        <div class="mt-2 text-white border-t-2 border-yellow-300 pt-2 font-semibold text-sm">
                            {{ $actor['known_for'] }}
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="flex justify-between">
            @if ($previous)
                <a class="text-white rounded-lg py-2 duration-200 hover:opacity-60 px-4 font-medium text-lg nav-color"
                    href="/actors/page/{{ $previous }}">Previous</a>
            @else
                <div></div>
            @endif

            @if ($next)
                <a class="text-white rounded-lg py-2 duration-200 hover:opacity-60 px-4 font-medium text-lg nav-color"
                    href="/actors/page/{{ $next }}">Next</a>
            @else
                <div></div>
            @endif
        </div>


    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
@endsection
