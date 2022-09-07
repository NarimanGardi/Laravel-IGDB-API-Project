<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Str;
class ShowGame extends Component
{
    public $slug;
    public $game;

    public function loadShowGame(){
        $showGamesUnformated = Http::withHeaders(config('services.igdb'))
        ->withBody("
        fields name, cover.url, first_release_date, platforms.abbreviation, rating,
        slug, involved_companies.company.name, genres.name, aggregated_rating, summary, websites.*, videos.*, screenshots.*,
        similar_games.cover.url, similar_games.name, similar_games.rating,similar_games.platforms.abbreviation, similar_games.slug;
        where slug = \"{$this->slug}\";",
        "text/plain")->post('https://api.igdb.com/v4/games/')
        ->json();
        $this->game = $this->formatforView($showGamesUnformated[0]); 
    }
    private function formatforView($game){
       
        return collect($game)->merge([
                'coverImageURL' => array_key_exists('cover',$game) ? Str::replaceFirst('thumb','cover_big',$game['cover']['url']) : null,
                'memberRating' => array_key_exists('rating',$game) ? round($game['rating']) :null,
                'criticRating' => array_key_exists('aggregated_rating',$game) ? round($game['aggregated_rating']): null,
                'genres' => array_key_exists('genres',$game) ?  collect($game['genres'])->map(function($genres){
                    return $genres['name'];
                })->implode(', ') : null,
                'involved_companies' => array_key_exists('involved_companies',$game) ? $game['involved_companies'][0]['company']['name'] : null,
                'platforms' => array_key_exists('platforms',$game) ? collect($game['platforms'])->map(function($platform){
                    return array_key_exists('abbreviation',$platform) ? $platform['abbreviation'] : null;
                })->implode(', ') : null,
                'trailer_url' => array_key_exists('videos',$game) ?  'https://youtube.com/embed/'.$game['videos'][0]['video_id'] : null,
                'screenshots' =>  array_key_exists('screenshots',$game) ? collect($game['screenshots'])->map(function($screenshot){
                    return [
                        'huge' => Str::replaceFirst('thumb','screenshot_huge',$screenshot['url']),
                        'big' => Str::replaceFirst('thumb','screenshot_big',$screenshot['url']),
                    ];
                }) : null,
                'similarGames' => array_key_exists('similar_games',$game) ?  collect($game['similar_games'])->map(function($similarGame){
                   return collect($similarGame)->merge([
                        'coverImageURL' => Str::replaceFirst('thumb','cover_big',$similarGame['cover']['url']),
                        'rating' => array_key_exists('rating',$similarGame) ? round($similarGame['rating']) : null,
                        'platforms' => collect($similarGame['platforms'])->map(function($platform){
                            return array_key_exists('abbreviation',$platform) ? $platform['abbreviation'] : null;
                        })->implode(', '),
                    ]);
                }) : null,
                'social' => [
                    'website' => array_key_exists('websites',$game) ? collect($game['websites'])->first() : null,
                    'facebook' => array_key_exists('websites',$game) ? collect($game['websites'])->filter(function($website){
                        return Str::contains($website['url'],'facebook');
                    })->first() : null,
                    'twitter' => array_key_exists('websites',$game) ? collect($game['websites'])->filter(function($website){
                        return Str::contains($website['url'],'twitter');
                    })->first() : null,
                    'instagram' => array_key_exists('websites',$game) ? collect($game['websites'])->filter(function($website){
                        return Str::contains($website['url'],'instagram');
                    })->first() : null,
                ],
            ]);
    }
    public function render()
    {
        return view('livewire.show-game');
    }
}
