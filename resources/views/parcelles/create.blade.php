@extends('layouts.app')

@section('titre', 'Ajouter une parcelle')

@section('contenu')
    <a href="{{ route('parcelles.index') }}">&larr; Retour à la liste</a>
    <h1>Ajouter une parcelle</h1>

    <form action="{{ route('parcelles.store') }}" method="POST">
        @csrf
        @include('parcelles._form')
    </form>
@endsection