<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Illuminate\Support\Str;

class MobileGames extends Component
{
    public $perReq =24;
    public $mobileGames = [];

    public function loadMore()
    {
        $this->perReq = $this->perReq + 12;
        $this->loadMobileGames();
    }
    public function loadMobileGames(){
        $mobileGamesUnformated  
            = Http::withHeaders(config('services.igdb')) 
            ->withBody("
            fields name,cover.url,first_release_date,platforms.abbreviation,rating,total_rating_count,slug; 
            where platforms = (34,39) & rating >=0 ; 
            limit {$this->perReq};",
            "text/plain")->post('https://api.igdb.com/v4/games/')
            ->json();
        
        $this->mobileGames = $this->formatforView($mobileGamesUnformated);
        collect($this->mobileGames)->filter(function ($game) {
            return $game['coverImageURL'];
        })->each(function ($game) {
            $this->emit('MobileGameWithRatingAdded',[
                'slug' => $game['slug'],
                'rating' =>  $game['rating'] /100 ,
            ]);
        });
       
    }
    public function formatforView($games){
        return collect($games)->map(function($game){
            return collect($game)->merge([
                'coverImageURL' => array_key_exists('cover',$game) ? Str::replaceFirst('thumb','logo_med',$game['cover']['url']) : null,
                'rating' => array_key_exists('rating',$game) ? round($game['rating']) : null,
                'platforms' => collect($game['platforms'])->map(function($platform){
                    return array_key_exists('abbreviation',$platform) ?  $platform['abbreviation'] : null;
                })->implode(', ') ,
            ]);
        })->toArray();
    }
    public function render()
    {
        return view('livewire.mobile-games');
    }
}
