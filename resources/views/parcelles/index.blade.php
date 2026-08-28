@extends('layouts.app')

@section('titre', 'Liste des parcelles')

@section('contenu')
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h1>Liste des parcelles</h1>
        <a href="{{ route('parcelles.create') }}" class="btn btn-primary">+ Ajouter une parcelle</a>
    </div>

    <form action="{{ route('parcelles.index') }}" method="GET"
          style="display:flex; gap:0.5rem; margin-top:1rem; flex-wrap:wrap; align-items:center;">
        <input type="text" name="q" value="{{ $q ?? '' }}"
               placeholder="Rechercher par nom ou culture..." style="flex:1; min-width:200px;">
        <select name="statut" style="min-width:150px;">
            <option value="">Tous</option>
            @foreach (App\Models\Parcelle::statuts() as $valeur => $libelle)
                <option value="{{ $valeur }}" @selected(($statut ?? '') === $valeur)>{{ $libelle }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Rechercher</button>
        @if ($q !== null || $statut !== null)
            <a href="{{ route('parcelles.index') }}" class="btn btn-secondary">Réinitialiser</a>
        @endif
    </form>

    @if ($parcelles->isEmpty())
        @if ($q !== null || $statut !== null)
            <p>Aucune parcelle trouvée.</p>
        @else
            <p>Aucune parcelle enregistrée pour le moment.</p>
        @endif
    @else
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Culture</th>
                    <th>Superficie (ha)</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($parcelles as $parcelle)
                    <tr>
                        <td>{{ $parcelle->nom }}</td>
                        <td>{{ $parcelle->culture }}</td>
                        <td>{{ $parcelle->superficie }}</td>
                        <td>
                            <span class="badge badge-{{ $parcelle->statutBadge() }}">
                                {{ $parcelle->statutLibelle() }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('parcelles.show', $parcelle) }}" class="btn btn-secondary">Voir</a>
                            <a href="{{ route('parcelles.edit', $parcelle) }}" class="btn btn-edit">Modifier</a>
                            <form action="{{ route('parcelles.destroy', $parcelle) }}" method="POST" style="display:inline"
                                  onsubmit="return confirm('Supprimer définitivement cette parcelle ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top:1rem;">
            {{ $parcelles->links() }}
        </div>
    @endif
@endsection