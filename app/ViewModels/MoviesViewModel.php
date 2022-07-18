<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public $popular_movies;
    public $now_playing_movies;
    public $top_rated_movies;
    public $genres;

    public function __construct($popular_movies, $now_playing_movies, $top_rated_movies, $genres)
    {
        $this->popular_movies = $popular_movies;
        $this->now_playing_movies = $now_playing_movies;
        $this->top_rated_movies = $top_rated_movies;
        $this->genres = $genres;
    }

    public function popularMovies()
    {
        return $this->formatMovies($this->popular_movies);
    }

    public function nowPlayingMovies()
    {
        return $this->formatMovies($this->now_playing_movies);
    }

    public function topRatedMovies()
    {
        return $this->formatMovies($this->top_rated_movies);
    }

    public function genres()
    {
        return collect($this->genres)->mapWithKeys(function($genre) {
            return [$genre['id'] => $genre['name']];            
        });
    }

    private function formatMovies($movies)
    {
        return collect($movies)->map(function($movie) {
            $genresFormatted = collect($movie['genre_ids'])->mapWithKeys(function($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return collect($movie)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'],
                'release_date' => Carbon::parse($movie['release_date'])->format('M d, Y'),
                'genres' => $genresFormatted,
            ])->only('id', 'poster_path', 'title', 'vote_average', 'release_date', 'genres');
        });
    }
}
