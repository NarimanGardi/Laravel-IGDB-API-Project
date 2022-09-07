@extends('layouts.app')
@section('title')
{{ __('Mobile Games') }}
@endsection
@section('content')
<div  class="container mx-auto px-4">
    <h2 class="text-blue-500 uppercase tracking-wider font-semibold">Mobile Games</h2>
    <livewire:mobile-games />
</div>

@endsection