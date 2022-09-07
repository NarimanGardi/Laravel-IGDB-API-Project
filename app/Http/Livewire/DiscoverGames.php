<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Str;

class DiscoverGames extends Component
{
    public $themes =[] ;
    public $tempTheme = '';
    public $genres = [];
    public $tempGenre = '';
    public $platforms = [];
    public $tempPlatforms = '';
    public $perReq =20;
    public $DiscoverGames = [];

    public function loadMore()
    {
        $this->perReq = $this->perReq + 10;
        if($this->tempTheme != ''){
            $this->updated();
        }
        else
        {
            $this->loadDiscoverGames();
        }
        
    }

    public function updated()
    {
            $this->ThemeCheck();
            $this->GenreCheck();
            $this->PlatformCheck();
            $DiscoverGamesUnformated  
                = Http::withHeaders(config('services.igdb')) 
                ->withBody("
                fields name,cover.url,first_release_date,platforms.abbreviation,rating,total_rating_count,slug;
                where ({$this->tempPlatforms} & {$this->tempTheme} & {$this->tempGenre} & rating >= 0) ;
                sort total_rating_count desc;
                limit {$this->perReq};",
                "text/plain")->post('https://api.igdb.com/v4/games/')
                ->json();
            
            $this->DiscoverGames = $this->formatforView($DiscoverGamesUnformated);
            collect($this->DiscoverGames)->filter(function ($game) {
                return $game['rating'];
            })->each(function ($game) {
                $this->emit('DiscoverGameWithRatingAdded',[
                    'slug' => $game['slug'],
                    'rating' => $game['rating'] /100,
                ]);
            });
    }
    public function loadDiscoverGames(){
        $DiscoverGamesUnformated  
            = Http::withHeaders(config('services.igdb')) 
            ->withBody("
            fields name,cover.url,first_release_date,platforms.abbreviation,rating,total_rating_count,slug;
            where rating >= 0;
            sort first_release_date desc; 
            limit {$this->perReq};",
            "text/plain")->post('https://api.igdb.com/v4/games/')
            ->json();
        
        $this->DiscoverGames = $this->formatforView($DiscoverGamesUnformated);
        collect($this->DiscoverGames)->filter(function ($game) {
            return $game['rating'];
        })->each(function ($game) {
            $this->emit('DiscoverGameWithRatingAdded',[
                'slug' => $game['slug'],
                'rating' => $game['rating'] /100,
            ]);
        });
       
    }
    public function formatforView($games){
        return collect($games)->map(function($game){
            return collect($game)->merge([
                'coverImageURL' => array_key_exists('cover',$game) ? Str::replaceFirst('thumb','cover_big',$game['cover']['url']) : null,
                'rating' => array_key_exists('rating',$game) ? round($game['rating']) : null,
                'platforms' => array_key_exists('platforms',$game) ? collect($game['platforms'])->map(function($platform){
                    return array_key_exists('abbreviation',$platform) ?  $platform['abbreviation'] : null;
                })->implode(', ') : null,
            ]);
        })->toArray();
    }
    public function render()
    {
        return view('livewire.discover-games');
    }

    private function ThemeCheck(){
        if(count($this->themes) > 0){
            $this->tempTheme = "themes = (" . implode(',', $this->themes) . ")";
        }
        else{
            $this->tempTheme = "themes = (1,17,21)";
        }
    }
    private function GenreCheck(){
        if(count($this->genres) > 0){
            $this->tempGenre = "genres = (" . implode(',', $this->genres) . ")";
        }
        else{
            $this->tempGenre = "genres = (4,5,12,31)";
        }
    }
    private function PlatformCheck(){
        if(count($this->platforms) > 0){
            $this->tempPlatforms = "platforms = (" . implode(',', $this->platforms) . ")";
        }
        else{
            $this->tempPlatforms = "platforms = (48,49,6,167,169)";
        }
    }
}
