<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Recentgames extends Component
{
    public $recentGames = [];
    public function loadRecentGames(){
        $before = Carbon::now()->subMonths(5)->timestamp;
        $after = Carbon::now()->timestamp;
        $recentGamesUnformated = Cache::remember('recent-games', 60*60, function () use($before,$after) {
            return Http::withHeaders(config('services.igdb'))
            ->withBody("
            fields name,cover.url,first_release_date,platforms.abbreviation,rating,total_rating_count,slug,release_dates.human; 
            where platforms = (48,49,6,167,169) 
            & (first_release_date >={$before}
            & first_release_date <= {$after}
           );
            sort first_release_date desc; 
            limit 12;",
            "text/plain")->post('https://api.igdb.com/v4/games/')
            ->json();
            dump($this->recentGamesUnformated);
            
        });
        $this->recentGames = $this->formatforView($recentGamesUnformated);
        collect($this->recentGames)->filter(function ($game) {
            return $game['rating'];
        })->each(function ($game) {
            $this->emit('recentGameWithRatingAdded',[
                'slug' => $game['slug'],
                'rating' => $game['rating'] /100,
            ]);
        });
    }
    public function formatforView($games){
        return collect($games)->map(function($game){
            return collect($game)->merge([
                'coverImageURL' => array_key_exists('cover',$game) ? Str::replaceFirst('thumb','cover_big',$game['cover']['url']) : null,
                'rating' => array_key_exists('rating',$game) ?  round($game['rating']) : null,
                'platforms' => collect($game['platforms'])->map(function($platform){
                    return $platform['abbreviation'];
                })->implode(', '),
            ]);
        })->toArray();
    }

    public function render()
    {
        return view('livewire.recentgames');
    }
}
