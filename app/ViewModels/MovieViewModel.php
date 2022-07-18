<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MovieViewModel extends ViewModel
{
    public $movie;

    public function __construct($movie)
    {
        $this->movie = $movie;
    }

    public function movie()
    {
        return collect($this->movie)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $this->movie['poster_path'],
            'vote_average' => number_format($this->movie['vote_average'], 1),
            'release_date' => Carbon::parse($this->movie['release_date'])->format('M d, Y'),
            'genres' => collect($this->movie['genres'])->pluck('name')->flatten()->implode(', '),
            'crew' => collect($this->movie['credits']['crew'])->take(3),
            'cast' => collect($this->movie['credits']['cast'])->take(15),
        ])->only('id', 'poster_path', 'title', 'vote_average', 'release_date', 'genres', 'overview', 'crew', 'videos', 'cast');
    }
}
