<div class="game mt-8">
    <div class="relative inline-block">
        <a href="{{ route('game.show',$game['slug']) }}">
            @if ($game['coverImageURL'] != null)
            <img src="{{ $game['coverImageURL']}}" class="hover:opacity-75 transition ease-in-out duration-150"
                alt="Game Cover">
            @else
            <img src="{{ asset('/img/missing.png') }}" class="hover:opacity-75 transition ease-in-out duration-150"
                alt="Missing Cover">
            @endif
            
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
</div>
