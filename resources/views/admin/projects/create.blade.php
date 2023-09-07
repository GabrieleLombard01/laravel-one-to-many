@extends('layouts.app')

@section('title', 'Create-Project')

@section('content')
    <header>
        <h3 class="ms-1 fw-bold">Crea un nuovo progetto...</h3>
        <a class="text-center ms-1 btn btn-sm btn-secondary" href="{{ route('admin.projects.index') }}"><i
                class="fas fa-arrow-left me-2"></i>Torna
            indietro</a>
        <hr>
    </header>

    {{-- Form --}}
    @include('includes.projects.form')

@endsection

@section('scripts')
    @vite('resources/js/slug-generator.js')
    {{-- @vite('resources/js/image-previewer.js') --}}
@endsection
