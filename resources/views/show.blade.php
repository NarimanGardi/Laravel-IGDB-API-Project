@extends('layouts.app')

@section('content')

<livewire:show-game :slug="$slug" />
{{-- end container --}}
@endsection
