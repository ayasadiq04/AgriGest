<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParcelleRequest;
use App\Models\Parcelle;

class ParcelleController extends Controller
{
    /**
     * US5 — Afficher la liste de toutes les parcelles.
     */
    public function index()
    {
        $parcelles = Parcelle::orderBy('nom')->paginate(10);

        return view('parcelles.index', compact('parcelles'));
    }

    /**
     * Afficher le formulaire d'ajout d'une parcelle (US2).
     */
    public function create()
    {
        $statuts = Parcelle::statuts();

        return view('parcelles.create', compact('statuts'));
    }

    /**
     * US2 — Enregistrer une nouvelle parcelle en base de données.
     */
    public function store(ParcelleRequest $request)
    {
        Parcelle::create($request->validated());

        return redirect()
            ->route('parcelles.index')
            ->with('succes', 'La parcelle a été ajoutée avec succès.');
    }

    /**
     * US1 — Afficher la fiche détaillée d'une parcelle.
     */
    public function show(Parcelle $parcelle)
    {
        return view('parcelles.show', compact('parcelle'));
    }

    /**
     * Afficher le formulaire de modification d'une parcelle (US3).
     */
    public function edit(Parcelle $parcelle)
    {
        $statuts = Parcelle::statuts();

        return view('parcelles.edit', compact('parcelle', 'statuts'));
    }

    /**
     * US3 — Mettre à jour une parcelle existante.
     */
    public function update(ParcelleRequest $request, Parcelle $parcelle)
    {
        $parcelle->update($request->validated());

        return redirect()
            ->route('parcelles.index')
            ->with('succes', 'La parcelle a été modifiée avec succès.');
    }

    /**
     * US4 — Supprimer une parcelle qui n'est plus exploitée.
     */
    public function destroy(Parcelle $parcelle)
    {
        $parcelle->delete();

        return redirect()
            ->route('parcelles.index')
            ->with('succes', 'La parcelle a été supprimée avec succès.');
    }
}
