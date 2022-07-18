<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search = '';
    
    public function render()
    {
        $search_results = [];

        if(strlen($this->search) > 1) {
            $search_results = Http::withToken(config('services.tmdb.token'))
                                ->get("https://api.themoviedb.org/3/search/movie?query=$this->search&api_key=" . env('TMDB_API_KEY'))
                                ->json()['results'];
        }

        // dump($search_results);

        return view('livewire.search-dropdown', [
            "search_results" => collect($search_results)->take(7),
        ]);
    }
}
