@extends('layouts.app')

@section('content')
    <!-- Contenu spécifique à la page boards/index -->
    @foreach ($boards as $board)
        <div>
            <h2>{{ $board->name }}</h2>
            <p>{{ $board->background }}</p>
        </div>
    @endforeach
@endsection
