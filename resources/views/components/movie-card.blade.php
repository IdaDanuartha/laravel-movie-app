<div>
    <div class="rounded-lg dark:bg-gray-800 dark:border-gray-700">
        <a href="{{ route('movies.show', $movie['id']) }}">
            <img class="rounded-md duration-200 hover:opacity-60 hover:scale-105" src="{{ $movie['poster_path'] }}"
                alt="">
        </a>
        <div class="p-3">
            <a href="{{ route('movies.show', $movie['id']) }}">
                <h5 class="mb-2 text-xl font-bold tracking-tight text-color dark:text-white">
                    {{ $movie['title'] }}</h5>
            </a>
            <div class="flex text-white font-semibold">
                <div class="flex items-center">
                    <svg class="text-yellow-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <p class="mx-2">{{ $movie['vote_average'] }}</p>
                </div>
                <span>|</span>
                <p class="ml-2">{{ $movie['release_date'] }}</p>
            </div>
            <div class="mt-2 text-white border-t-2 border-yellow-300 pt-2 font-semibold text-sm">
                {{ $movie['genres'] }}
            </div>
        </div>
    </div>
</div>
