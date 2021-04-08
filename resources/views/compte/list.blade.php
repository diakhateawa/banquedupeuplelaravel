@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des comptes</div>
                <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Identifiant</th>
                        <th>Numero du compte</th>
                        <th>Solde du compte</th>
                        <th>Client</th>
                        <th>Utilisateur</th>   
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                    @foreach($liste_comptes as $compte)
                        <tr>
                            <td>{{ $compte->id }}</td>
                            <td>{{ $compte->numero }}</td>
                            <td>{{ $compte->solde }}</td>
                            <td>{{ $compte->clients}}</td>
                            <td>{{ $compte->users}}</td>
                            <td>{{ $compte->telephone }}</td>
                            <td><a href="{{ route('editcompte', ['id'=>$compte->id]) }}">Editer</a></td>
                            <td><a href="{{ route('deletecompte', ['id'=>$compte->id]) }}" onclick="return confirm('Voulez-vous supprimer?');">Supprimer</a></td>
                        </tr>
                    @endforeach
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
