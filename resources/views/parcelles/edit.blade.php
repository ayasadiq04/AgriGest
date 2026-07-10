@extends('layouts.app')

@section('titre', 'Modifier une parcelle')

@section('contenu')
    <a href="{{ route('parcelles.index') }}">&larr; Retour à la liste</a>
    <h1>Modifier la parcelle « {{ $parcelle->nom }} »</h1>

    <form action="{{ route('parcelles.update', $parcelle) }}" method="POST">
        @csrf
        @method('PUT')
        @include('parcelles._form')
    </form>
@endsection