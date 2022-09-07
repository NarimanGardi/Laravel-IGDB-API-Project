<div class="relative" x-data="{ isVisible : true }" @click.away="isVisible = false">
    <input wire:model.debounce.300ms="search" type="search" autocomplete="off" name="search"
        class="bg-gray-800 text-sm rounded-full pl-8 focus:outline-none focus:shadow-outline w-64 px-3 py-1"
        placeholder="Search (press '/' to focus)"
        x-ref="search" 
        @keydown.window = "
        if (event.keyCode === 191) {
            event.preventDefault();
            $refs.search.focus();
        }
        "
            
        @focus="isVisible = true"
        @keydown.escape.window = "isVisible = false"
        @keydown="isVisible = true"
        @keydown.shift.tab = "isVisible = false"
        
        >
    <button type="submit" class="absolute top-1 flex items-center ml-2">
        <svg class="fill-current text-gray-400 w-6" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z" />
            <path
                d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z" />
        </svg>
    </button>
    <div wire:loading class="spinner top-0 right-0 mr-0.20 mt-0.15 " style="position: absolute"></div>
    @if(strlen($search) > 2)
    <div class="absolute w-64 z-50 bg-gray-800 text-xs rounded mt-2" x-transition.opacity.duration.500ms x-show="isVisible">
        @if(count($searchResults) > 0)
        <ul>
            @foreach ($searchResults as $game)
            @if(isset($game['cover']))
            <li class="border-b border-gray-700 ">
                <a href="{{ route('game.show',$game['slug']) }}" class="flex items-center hover:bg-gray-700 transition ease-in-out duration-150 px-3 py-3"
                @if($loop->last)
                @keydown.tab = "isVisible = false"
                @endif>
                    
                    <img src="{{Str::replaceFirst('thumb','cover_big',$game['cover']['url'])}}" class="w-10" alt="Cover" ><span class="ml-4">{{ $game['name'] }}</span>
                   
                </a>
            </li>
            @else
            @continue
            @endif
            @endforeach
        </ul>
        @else
        <div class="text-center px-3 py-3 text-gray-400">No results found for "{{ $search }}"</div>
        @endif
    </div>
    @endif
</div>
