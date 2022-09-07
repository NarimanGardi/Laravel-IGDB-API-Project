<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropDown extends Component
{
    public $search = '';
    public $searchResults = [];
    public function render()
    {
        if(strlen($this->search) > 2){
            $this->searchResults  = Http::withHeaders(config('services.igdb'))
            ->withBody("
            fields name , cover.url , slug  ; search \"{$this->search}\"; limit 7;",
            "text/plain")->post('https://api.igdb.com/v4/games/')
            ->json();
        }
        
        return view('livewire.search-drop-down');
    }
}
