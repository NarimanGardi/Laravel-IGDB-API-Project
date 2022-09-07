<div class="flex flex-col lg:flex-row my-10" wire:init="loadDiscoverGames">
    <div class="filter-by lg:w-7/100 m-0 lg:mr-32">
        <h2 class="text-blue-500 uppercase tracking-wider font-semibold mb-2">Filter By</h2>
        <h3 class=" font-semibold text-blue-400">Theme</h3>
        <ul class="w-48 text-sm font-medium text-white rounded-lg ">
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="Action-checkbox" type="checkbox" value="1" wire:model="themes" class="w-4 h-4  rounded">
                    <label for="Action-checkbox" class="py-1 ml-2 w-full text-sm font-medium text-white">Action</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="Fantasy-checkbox" type="checkbox" value="17" wire:model="themes"
                        class="w-4 h-4  rounded">
                    <label for="Fantasy-checkbox"
                        class="py-1 ml-2 w-full text-sm font-medium text-white">Fantasy</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="Science-checkbox" type="checkbox" value="18" wire:model="themes"
                        class="w-4 h-4  rounded">
                    <label for="Science-checkbox" class="py-1 ml-2 w-full text-sm font-medium text-white">Science
                        fiction</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="Horror-checkbox" type="checkbox" value="19" wire:model="themes" class="w-4 h-4  rounded">
                    <label for="Horror-checkbox" class="py-1 ml-2 w-full text-sm font-medium text-white">Horror</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="Survival-checkbox" type="checkbox" value="21" wire:model="themes"
                        class="w-4 h-4  rounded">
                    <label for="Survival-checkbox"
                        class="py-1 ml-2 w-full text-sm font-medium text-white">Survival</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="Historical-checkbox" type="checkbox" value="22" wire:model="themes"
                        class="w-4 h-4  rounded">
                    <label for="Historical-checkbox"
                        class="py-1 ml-2 w-full text-sm font-medium text-white">Historical</label>
                </div>
            </li>
        </ul>
        <br>
        <hr class="w-48 py-2" style="margin-left: -40px;">
        <h3 class=" font-semibold text-blue-400">Genre</h3>
        <ul class="w-48 text-sm font-medium text-white rounded-lg ">
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="Fighting-checkbox" type="checkbox" value="4" wire:model="genres"
                        class="w-4 h-4  rounded">
                    <label for="Fighting-checkbox"
                        class="py-1 ml-2 w-full text-sm font-medium text-white">Fighting</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="Indie-checkbox" type="checkbox" value="32" wire:model="genres" class="w-4 h-4  rounded">
                    <label for="Indie-checkbox" class="py-1 ml-2 w-full text-sm font-medium text-white">Indie</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="Shooter-checkbox" type="checkbox" value="5" wire:model="genres" class="w-4 h-4  rounded">
                    <label for="Shooter-checkbox"
                        class="py-1 ml-2 w-full text-sm font-medium text-white">Shooter</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="Puzzle-checkbox" type="checkbox" value="9" wire:model="genres" class="w-4 h-4  rounded">
                    <label for="Puzzle-checkbox" class="py-1 ml-2 w-full text-sm font-medium text-white">Puzzle</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="Racing-checkbox" type="checkbox" value="10" wire:model="genres" class="w-4 h-4  rounded">
                    <label for="Racing-checkbox" class="py-1 ml-2 w-full text-sm font-medium text-white">Racing</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="RPG-checkbox" type="checkbox" value="12" wire:model="genres" class="w-4 h-4  rounded">
                    <label for="RPG-checkbox" class="py-1 ml-2 w-full text-sm font-medium text-white">Role-playing
                        (RPG)</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="Simulator-checkbox" type="checkbox" value="13" wire:model="genres"
                        class="w-4 h-4  rounded">
                    <label for="Simulator-checkbox"
                        class="py-1 ml-2 w-full text-sm font-medium text-white">Simulator</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="Sport-checkbox" type="checkbox" value="14" wire:model="genres" class="w-4 h-4  rounded">
                    <label for="Sport-checkbox" class="py-1 ml-2 w-full text-sm font-medium text-white">Sport</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="Strategy-checkbox" type="checkbox" value="15" wire:model="genres"
                        class="w-4 h-4  rounded">
                    <label for="Strategy-checkbox"
                        class="py-1 ml-2 w-full text-sm font-medium text-white">Strategy</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="Adventure-checkbox" type="checkbox" value="31" wire:model="genres"
                        class="w-4 h-4  rounded">
                    <label for="Adventure-checkbox"
                        class="py-1 ml-2 w-full text-sm font-medium text-white">Adventure</label>
                </div>
            </li>
        </ul>
        <br>
        <hr class="w-48 py-2" style="margin-left: -40px;">
        <h3 class=" font-semibold text-blue-400">Platform</h3>
        <ul class="w-48 text-sm font-medium text-white rounded-lg ">
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="PC-checkbox" type="checkbox" value="6" wire:model="platforms" class="w-4 h-4  rounded">
                    <label for="PC-checkbox" class="py-1 ml-2 w-full text-sm font-medium text-white">PC</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="Mac-checkbox" type="checkbox" value="14" wire:model="platforms" class="w-4 h-4  rounded">
                    <label for="Mac-checkbox" class="py-1 ml-2 w-full text-sm font-medium text-white">Mac</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="PS2-checkbox" type="checkbox" value="8" wire:model="platforms" class="w-4 h-4  rounded">
                    <label for="PS2-checkbox" class="py-1 ml-2 w-full text-sm font-medium text-white">PS2</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="PS3-checkbox" type="checkbox" value="9" wire:model="platforms" class="w-4 h-4  rounded">
                    <label for="PS3-checkbox" class="py-1 ml-2 w-full text-sm font-medium text-white">PS3</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="PS4-checkbox" type="checkbox" value="48" wire:model="platforms" class="w-4 h-4  rounded">
                    <label for="PS4-checkbox" class="py-1 ml-2 w-full text-sm font-medium text-white">PS4</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="PS5-checkbox" type="checkbox" value="168" wire:model="platforms"
                        class="w-4 h-4  rounded">
                    <label for="PS5-checkbox" class="py-1 ml-2 w-full text-sm font-medium text-white">PS5</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="X360-checkbox" type="checkbox" value="12" wire:model="platforms"
                        class="w-4 h-4  rounded">
                    <label for="X360-checkbox" class="py-1 ml-2 w-full text-sm font-medium text-white">X360</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="One-checkbox" type="checkbox" value="49" wire:model="platforms" class="w-4 h-4  rounded">
                    <label for="One-checkbox" class="py-1 ml-2 w-full text-sm font-medium text-white">Xbox One</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="Series-checkbox" type="checkbox" value="169" wire:model="platforms"
                        class="w-4 h-4  rounded">
                    <label for="Series-checkbox" class="py-1 ml-2 w-full text-sm font-medium text-white">Xbox Series
                        X|S</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="Switch-checkbox" type="checkbox" value="130" wire:model="platforms"
                        class="w-4 h-4  rounded">
                    <label for="Switch-checkbox" class="py-1 ml-2 w-full text-sm font-medium text-white">Nintendo
                        Switch</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="Android-checkbox" type="checkbox" value="34" wire:model="platforms"
                        class="w-4 h-4  rounded">
                    <label for="Android-checkbox"
                        class="py-1 ml-2 w-full text-sm font-medium text-white">Android</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg ">
                <div class="flex items-center ">
                    <input id="IOS-checkbox" type="checkbox" value="39" wire:model="platforms" class="w-4 h-4  rounded">
                    <label for="IOS-checkbox" class="py-1 ml-2 w-full text-sm font-medium text-white">IOS</label>
                </div>
            </li>

        </ul>
    </div>
    <div class="discover-games w-full lg:w-93/100 mt-12 lg:mt-0">
        <h2 class="text-blue-500 uppercase tracking-wider font-semibold">Explore</h2>
        <div
            class="discover-games text-sm grid grid-cols-1 content-center md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-12 pb-16">
            @forelse ($DiscoverGames as $game)
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
                </button></div>
        @endif
    </div>
</div>
</div>
@push('scripts')
@include('_rating',[
'event' => 'DiscoverGameWithRatingAdded',
])
@endpush
