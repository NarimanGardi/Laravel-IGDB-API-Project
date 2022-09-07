<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Str;

class Top250 extends Component
{
    public $perReq =24;
    public $topGames = [];

    public function loadMore()
    {
        $this->perReq = $this->perReq + 12;
        $this->loadTopGames();
    }
    public function loadTopGames(){
        $topGamesUnformated  
            = Http::withHeaders(config('services.igdb')) 
            ->withBody("
            fields name,cover.url,first_release_date,platforms.abbreviation,rating,total_rating_count,slug; 
            where platforms = (48,49,6,167,169) 
            & ( rating > 75
            & total_rating_count >200); 
            sort rating desc;
            limit {$this->perReq};",
            "text/plain")->post('https://api.igdb.com/v4/games/')
            ->json();
        
        $this->topGames = $this->formatforView($topGamesUnformated);
        collect($this->topGames)->filter(function ($game) {
            return $game['rating'];
        })->each(function ($game) {
            $this->emit('top100GameWithRatingAdded',[
                'slug' => $game['slug'],
                'rating' => $game['rating'] /100,
            ]);
        });
       
    }
    public function formatforView($games){
        return collect($games)->map(function($game){
            return collect($game)->merge([
                'coverImageURL' => Str::replaceFirst('thumb','cover_big',$game['cover']['url']),
                'rating' => round($game['rating']),
                'platforms' => collect($game['platforms'])->map(function($platform){
                    return array_key_exists('abbreviation',$platform) ?  $platform['abbreviation'] : null;
                })->implode(', ') ,
            ]);
        })->toArray();
    }
    public function render()
    {
        return view('livewire.top250');
    }
}
