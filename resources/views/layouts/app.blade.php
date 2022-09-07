<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>


    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @livewireStyles
</head>

<body class="bg-gray-900 text-white">
    <header class="border-b border-gray-800">
        <nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">
            <div class="flex flex-col lg:flex-row items-center">
                <a href="/home">
                    <img src="{{ asset('/img/logo.svg') }}" alt="Logo" class="w-32 flex-none">
                </a>
                <ul class="flex ml-0 lg:ml-16 mt-3 lg:mt-0 space-x-8">
                    <li><a href="{{ route('discover') }}" class="hover:text-gray-400">Discover</a></li>
                    <li><a href="{{ route('top-250') }}" class="hover:text-gray-400">Top 250</a></li>
                    <li><a href="{{ route('mobile') }}" class="hover:text-gray-400">Mobile Games</a></li>
                    <li><a href="{{ route('comming-soon') }}" class="hover:text-gray-400">Coming Soon</a></li>
                </ul>
            </div>
            <div class="flex item-center mt-3 lg:mt-0">
               <livewire:search-drop-down />

                <div class="ml-6">
                    <a href="#"><img src="{{ asset('/img/search.svg') }}" alt="Search" class="rounded-full w-8"></a>
                </div>
            </div>
        </nav>
    </header>
    <main class="py-8">
        @yield('content')
    </main>
    <footer class="border-t border-gray-800">
        <div class="container mx-auto px-4 py-6">
            Powered By <a href="#" class="underline hover:text-gray-400">IGDP API</a>
        </div>
    </footer>
    @livewireScripts
    <script src="/js/app.js"></script>
    <script src="/js/lightbox.js"></script>
    @stack('scripts')
</body>

</html>
