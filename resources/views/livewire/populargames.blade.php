<div wire:init="loadPopularGames" class="popular-games text-sm grid grid-cols-1 content-center md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
    @forelse ($popularGames as $game)
    <x-game-card :game="$game" />
    @empty
    @foreach (range(1,12) as $game)
    <x-game-skeloton />
    @endforeach
    @endforelse
</div>
@push('scripts')
        @include('_rating',[
                    'event' => 'popularGameWithRatingAdded',
                ])
@endpush