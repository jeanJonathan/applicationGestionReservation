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




}
