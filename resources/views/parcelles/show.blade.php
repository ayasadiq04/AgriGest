@extends('layouts.app')

@section('titre', 'Fiche parcelle - ' . $parcelle->nom)

@section('contenu')
    <a href="{{ route('parcelles.index') }}">&larr; Retour à la liste</a>

    <h1>{{ $parcelle->nom }}</h1>

    <table>
        <tr>
            <th>Culture</th>
            <td>{{ $parcelle->culture }}</td>
        </tr>
        <tr>
            <th>Superficie</th>
            <td>{{ $parcelle->superficie }} ha</td>
        </tr>
        <tr>
            <th>Date de plantation</th>
            <td>{{ $parcelle->date_plantation->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <th>Statut</th>
            <td><span class="badge badge-{{ $parcelle->statut }}">{{ $parcelle->statutLibelle() }}</span></td>
        </tr>
    </table>

    <div style="margin-top:1.5rem;">
        <a href="{{ route('parcelles.edit', $parcelle) }}" class="btn btn-edit">Modifier</a>
        <form action="{{ route('parcelles.destroy', $parcelle) }}" method="POST" style="display:inline"
              onsubmit="return confirm('Supprimer définitivement cette parcelle ?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-delete">Supprimer</button>
        </form>
    </div>
@endsection