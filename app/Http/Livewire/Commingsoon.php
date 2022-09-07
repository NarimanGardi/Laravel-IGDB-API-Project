<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Illuminate\Support\Str;
class Commingsoon extends Component
{
    public $commingSoon = [];
    public function loadcommingSoon(){
        $now = Carbon::now()->timestamp;
        $after = Carbon::now()->addYear(2)->timestamp;
        $commingSoonUnformated = Cache::remember('comming-soon', 60*60, function () use($now,$after) {
            return Http::withHeaders(config('services.igdb'))
            ->withBody("
            fields name,cover.url,first_release_date,rating,slug; 
            where platforms = (48,49,6,167,169) 
            & (first_release_date > {$now} 
            & first_release_date < {$after}); 
            sort rating desc;
            limit 10;",
            "text/plain")->post('https://api.igdb.com/v4/games/')
            ->json();
        });
        $this->commingSoon = $this->formatforView($commingSoonUnformated);
    }
    public function formatforView($games){
        return collect($games)->map(function($game){
            return collect($game)->merge([
                'coverImageURL' => array_key_exists('cover',$game) ? Str::replaceFirst('thumb','cover_small',$game['cover']['url']) :null,
                'first_release_date' =>  Carbon::parse($game['first_release_date'])->format('M d, Y'),
            ]);
        })->toArray();
    }
    public function render()
    {
        return view('livewire.commingsoon');
    }
}
