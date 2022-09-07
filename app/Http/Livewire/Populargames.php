<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Str;

class Populargames extends Component
{
    public $popularGames = [];
    public function loadPopularGames(){
        $now = Carbon::now()->timestamp;
        $after = Carbon::now()->subYear(1)->timestamp;
        $popularGamesUnformated = Cache::remember('popular-games', 60*60, function () use($now,$after) {
        return Http::withHeaders(config('services.igdb'))
            ->withBody("
            fields name,cover.url,first_release_date,platforms.abbreviation,rating,total_rating_count,slug; 
            where platforms = (48,49,6,167,169) 
            & ( rating > 60
            & first_release_date < {$now} 
            & first_release_date > {$after}); 
            sort first_release_date desc;
            limit 12;",
            "text/plain")->post('https://api.igdb.com/v4/games/')
            ->json();
        });
        
        $this->popularGames = $this->formatforView($popularGamesUnformated);
        collect($this->popularGames)->filter(function ($game) {
            return $game['rating'];
        })->each(function ($game) {
            $this->emit('popularGameWithRatingAdded',[
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
                    return $platform['abbreviation'];
                })->implode(', '),
            ]);
        })->toArray();
    }
    public function render()
    {
        return view('livewire.populargames');
    }
}
