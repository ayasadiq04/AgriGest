@if ($errors->any())
    <div class="errors">
        <strong>Merci de corriger les erreurs suivantes :</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="champ">
    <label for="nom">Nom de la parcelle</label>
    <input type="text" id="nom" name="nom" value="{{ old('nom', $parcelle->nom ?? '') }}" placeholder="Ex : Parcelle Nord">
</div>

<div class="champ">
    <label for="culture">Culture</label>
    <input type="text" id="culture" name="culture" value="{{ old('culture', $parcelle->culture ?? '') }}" placeholder="Ex : Blé">
</div>

<div class="champ">
    <label for="superficie">Superficie (en hectares)</label>
    <input type="number" step="0.01" min="0.01" id="superficie" name="superficie"
           value="{{ old('superficie', $parcelle->superficie ?? '') }}" placeholder="Ex : 3.5">
</div>

<div class="champ">
    <label for="date_plantation">Date de plantation</label>
    <input type="date" id="date_plantation" name="date_plantation"
           value="{{ old('date_plantation', isset($parcelle) ? $parcelle->date_plantation->format('Y-m-d') : '') }}">
</div>

<div class="champ">
    <label for="statut">Statut</label>
    <select id="statut" name="statut">
        @foreach ($statuts as $valeur => $libelle)
            <option value="{{ $valeur }}" @selected(old('statut', $parcelle->statut ?? '') === $valeur)>
                {{ $libelle }}
            </option>
        @endforeach
    </select>
</div>

<button type="submit" class="btn btn-primary">Enregistrer</button>
<a href="{{ route('parcelles.index') }}" class="btn btn-secondary">Annuler</a>