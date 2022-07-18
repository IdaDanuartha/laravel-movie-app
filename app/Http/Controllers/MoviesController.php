<?php

namespace App\Http\Controllers;

use App\ViewModels\MoviesViewModel;
use App\ViewModels\MovieViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popular_movies = Http::withToken(config('services.tmdb.token'))
                            ->get('https://api.themoviedb.org/3/movie/popular?api_key=' . env('TMDB_API_KEY'))
                            ->json()['results'];
        $now_playing_movies = Http::withToken(config('services.tmdb.token'))
                            ->get('https://api.themoviedb.org/3/movie/now_playing?api_key=' . env('TMDB_API_KEY'))
                            ->json()['results'];
        $top_rated_movies = Http::withToken(config('services.tmdb.token'))
                            ->get('https://api.themoviedb.org/3/movie/top_rated?api_key=' . env('TMDB_API_KEY'))
                            ->json()['results'];

        $genres = Http::withToken(config('services.tmdb.token'))
                            ->get('https://api.themoviedb.org/3/genre/movie/list?api_key=' . env('TMDB_API_KEY'))
                            ->json()['genres'];
        

        // dump($popular_movies);

        $viewModel = new MoviesViewModel(
            $popular_movies,
            $now_playing_movies,
            $top_rated_movies,
            $genres
        );

        return view('pages.movies', $viewModel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
                    ->get("https://api.themoviedb.org/3/movie/$id?api_key=" . env('TMDB_API_KEY') . '&append_to_response=credits,videos,images')
                    ->json();
        // dump($movie);

        $viewModel = new MovieViewModel($movie);

        return view('pages.movie', $viewModel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
