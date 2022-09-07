<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Str;

class Rcommingsoon extends Component
{
    public $perReq =24;
    public $commingsoon = [];

    public function loadMore()
    {
        $this->perReq = $this->perReq + 12;
        $this->loadCommingSoonGames();
    }
    public function loadCommingSoonGames(){
        $now = Carbon::now()->timestamp;
        $commingsoonUnformated  
            = Http::withHeaders(config('services.igdb')) 
            ->withBody("
            fields name,cover.url,first_release_date,slug,platforms.abbreviation; 
            where platforms = (48,49,6,167,169) 
            & (first_release_date >={$now}); 
            sort first_release_date asc;
            limit {$this->perReq};",
            "text/plain")->post('https://api.igdb.com/v4/games/')
            ->json();
        
        $this->commingsoon = $this->formatforView($commingsoonUnformated);
       
    }
    public function formatforView($games){
        return collect($games)->map(function($game){
            return collect($game)->merge([
                'coverImageURL' => array_key_exists('cover',$game) ? Str::replaceFirst('thumb','cover_big',$game['cover']['url']) : null,
                'first_release_date' =>  Carbon::parse($game['first_release_date'])->format('M d, Y'),
                'platforms' =>  collect($game['platforms'])->map(function($platform){
                    return array_key_exists('abbreviation',$platform) ?  $platform['abbreviation'] : null;
                })->implode(', ')  ,
            ]);
        })->toArray();
    }
    public function render()
    {
        return view('livewire.rcommingsoon');
    }
}
