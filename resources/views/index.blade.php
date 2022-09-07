@extends('layouts.app')
@section('title')
{{ __('Video Game') }}
@endsection

@section('content')
<div class="container mx-auto px-4">
    <h2 class="text-blue-500 uppercase tracking-wider font-semibold">poular games right now</h2>
    <livewire:populargames />
    {{-- {end popular games} --}}
    <h2 class="text-blue-500 uppercase tracking-wider font-semibold mt-8">Recently Released</h2>
    <livewire:recentgames />
    {{-- {end recent games} --}}
    <div class="flex flex-col lg:flex-row my-10">
        <div class="recently-reviewed w-full lg:w-3/4 m-0 lg:mr-32">
            <h2 class="text-blue-500 uppercase tracking-wider font-semibold">recently reviewed</h2>
            <livewire:recentlyreviewed />
        </div>
        {{-- end recently reviewed --}}
        <div class="comming-soon lg:w-1/4 mt-12 lg:mt-0">
            <h2 class="text-blue-500 uppercase tracking-wider font-semibold">MOST ANTICIPATED</h2>
            <livewire:commingsoon />
            {{-- view all --}}
            {{-- <a href="#" class="text-blue-500 mt-3 flex justify-center">View all</a> --}}
        </div>
        {{-- end Comming Soon --}}

    </div>
</div>
{{-- end container --}}

@endsection
