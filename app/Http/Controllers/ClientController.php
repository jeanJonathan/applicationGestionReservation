<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(10); // Récupère les clients enregistrés et les pagine

        return view('clients.index', compact('clients')); // Renvoie la vue index.blade.php avec les clients récupérés

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create'); // Renvoie la vue create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:clients,email',
            'telephone' => 'required',
        ]); // Valide les données envoyées par le formulaire

        $client = new Client;
        $client->nom = $request->nom;
        $client->email = $request->email;
        $client->telephone = $request->telephone;
        $client->save(); // Crée et enregistre le nouveau client dans la base de données

        return redirect()->route('clients.index')->with('success', 'Client ajouté avec succès.'); // Redirige vers la page d'accueil des clients avec un message de succès

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id); // Récupère le client spécifique avec l'ID fourni

        return view('clients.show', compact('client')); // Renvoie la vue show.blade.php avec les détails du client récupéré

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id); // Récupère le client spécifique avec l'ID fourni

        return view('clients.edit', compact('client')); // Renvoie la vue edit.blade.php avec les détails du client récupéré

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation des données envoyées par le formulaire d'édition
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'email' => 'required|email|unique:clients,email,'.$id,
            'telephone' => 'required',
        ]);

        // Si la validation échoue, on redirige l'utilisateur vers le formulaire d'édition avec les erreurs affichées
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // On met à jour les données du client correspondant à l'ID
        $client = Client::findOrFail($id);
        $client->nom = $request->input('nom');
        $client->email = $request->input('email');
        $client->telephone = $request->input('telephone');
        $client->save();

        // On redirige l'utilisateur vers la page de liste des clients avec un message de confirmation
        return redirect()->route('clients.index')->with('success', 'Client mis à jour avec succès !');

    }




}
