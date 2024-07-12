@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Création d'un nouveau tableau</h1>
    
    <form method="POST" action="{{ route('boards.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="background">Couleur de fond :</label>
            <input type="color" id="background" name="background" class="form-control" value="{{ old('background') }}">
            <small class="form-text text-muted">Entrez une couleur CSS (par exemple #FFFFFF pour blanc).</small>
            @error('background')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection

