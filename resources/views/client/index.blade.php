@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des clients</h1>
        <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">Ajouter un client</a>
        <table class="table">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->nom }}</td>
                    <td>{{ $client->prenom }}</td>
                    <td>{{ $client->email }}</td>
                    <td>
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning btn-sm">Editer</a>
                        <form action="{{ route('clients.destroy', $client->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Etes-vous sûr de vouloir supprimer ce client ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $clients->links('pagination::bootstrap-4') !!}
    </div>
@endsection
