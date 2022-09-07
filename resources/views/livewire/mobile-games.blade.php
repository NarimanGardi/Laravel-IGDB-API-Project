
<div wire:init="loadMobileGames"
    class="top100-games text-sm grid grid-cols-1 content-center md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 pb-16">
    @forelse ($mobileGames as $game)
    <x-game-card :game="$game" />

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

@push('scripts')
@include('_rating',[
'event' => 'MobileGameWithRatingAdded',
])
@endpush