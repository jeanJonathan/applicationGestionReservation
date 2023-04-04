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


}
