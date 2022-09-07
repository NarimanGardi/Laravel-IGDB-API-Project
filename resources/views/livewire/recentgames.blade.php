<div wire:init="loadRecentGames" class="recent-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
    @forelse ($recentGames as $game)
    @if($game['coverImageURL'] != null)
    <x-game-card :game="$game" />
    @endif
    @empty
    @foreach (range(1,12) as $game)
    <x-game-skeloton />
    @endforeach
    @endforelse 
</div>
@push('scripts')
        @include('_rating',[
                    'event' => 'recentGameWithRatingAdded',
                ])
@endpush
