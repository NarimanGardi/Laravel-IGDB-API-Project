<div wire:init="loadCommingSoonGames"
    class="top100-games text-sm grid grid-cols-1 content-center md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 pb-16">
    @forelse ($commingsoon as $game)
    @if($game['coverImageURL'] != null) 
    <div class="game mt-8">
        <div class="relative inline-block">
            <a href="{{ route('game.show',$game['slug']) }}">
                <img src="{{ $game['coverImageURL']}}" class="hover:opacity-75 transition ease-in-out duration-150"
                    alt="Game Cover">
            </a>
            @if(isset($game['rating']))
            <div id="{{ $game['slug'] }}" class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                style="right: -20px; bottom:-20px;">
            </div>
            @endif
        </div>
        <a href="{{ route('game.show',$game['slug']) }}"
            class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
            {{ $game['name'] }}</a>
    
        <div class="text-gray-400 mt-1 ">
            {{ $game['platforms'] }}
        </div>
        <div class="text-gray-400 mt-1 ">
            Release Date : {{ $game['first_release_date'] }}
        </div>
    </div>
    @endif
    @empty
    @foreach (range(1,12) as $game)
    <x-game-skeloton />
    @endforeach

    @endforelse
    @if ($perReq < 250) <div class="mt-4">
        <button class="px-4 py-3 text-lg font-semibold text-white rounded-xl bg-gray-500 hover:bg-gray-400"
            wire:click="loadMore">
            <span wire:loading class="spinner absolute top-0 left-0 mr-3"></span>
           
            Load More

        </button>
</div>
@endif
</div>

