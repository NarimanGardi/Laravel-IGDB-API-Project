<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Illuminate\Support\Str;

class Recentlyreviewed extends Component
{
    public $recentlyReviewed = [];
    public function loadRecentlyreviewed(){
        $before = Carbon::now()->subDays(2)->timestamp;
        $now = Carbon::now()->timestamp;

        $recentlyReviewedUnformated = Cache::remember('recently-reviewed', 60*60, function () use($before,$now) {
            return Http::withHeaders(config('services.igdb'))
            ->withBody("
            fields name,cover.url,first_release_date,platforms.abbreviation,rating,rating_count,summary,slug; 
            where platforms = (48,49,6,167,169) 
            & (updated_at >={$before}
            & updated_at <= {$now}
            & rating_count >= 5); 
            limit 3;",
            "text/plain")->post('https://api.igdb.com/v4/games/')
            ->json();
        });
        $this->recentlyReviewed = $this->formatforView($recentlyReviewedUnformated);
        collect($this->recentlyReviewed)->filter(function ($game) {
            return $game['rating'];
        })->each(function ($game) {
            $this->emit('reviewGameWithRatingAdded',[
                'slug' => 'review_'.$game['slug'],
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
                    return $platform['abbreviation'] ?? null;
                })->implode(', '),
            ]);
        })->toArray();
    }
    public function render()
    {
        return view('livewire.recentlyreviewed');
    }
}
