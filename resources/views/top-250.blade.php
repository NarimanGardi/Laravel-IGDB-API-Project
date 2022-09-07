@extends('layouts.app')
@section('title')
{{ __('Top 250 Game') }}
@endsection
@section('content')
<div  class="container mx-auto px-4">
    <h2 class="text-blue-500 uppercase tracking-wider font-semibold">Top 250 Games</h2>
    <livewire:top250 />
</div>

@endsection