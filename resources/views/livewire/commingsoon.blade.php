<div wire:init="loadcommingSoon">
    @forelse ($commingSoon as $game)
    @if($game['coverImageURL'] != null)
    <div class="comming-soon-container space-y-10 mt-8">
        <div class="game flex">
            <a href="{{ route('game.show',$game['slug']) }}">
                <img src="{{ $game['coverImageURL']}}"
                    class="w-16 hover:opacity-75 transition ease-in-out duration-150" alt="Game Cover">
            </a>
            <div class="ml-5">
                <a href="{{ route('game.show',$game['slug']) }}" class="hover:text-gray-300">{{ $game['name'] }}</a>
                <div class="text-gray-400 text-sm mt-1">
                    {{ $game['first_release_date'] }}</div>
            </div>
        </div>
    </div>
    @endif
    @empty
       @foreach (range(1,10) as $game)
       <div class="game flex mt-8">
        <div class="bg-gray-800 w-20 h-28" >
        </div>
        <div class="ml-5 ">
            <div class="text-transparent bg-gray-700 rounded leading-tight">nameasdasasdaqweqw</div>
            <div class="text-transparent bg-gray-700 rounded inline-block mt-3">
                Sept 16 2222</div>
        </div>
    </div>
       @endforeach
    @endforelse 
</div>

