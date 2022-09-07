@extends('layouts.app')
@section('title')
{{ __('Discover') }}
@endsection
@section('content')
<div class="container mx-auto px-4">
    <livewire:discover-games>
</div>

@endsection
