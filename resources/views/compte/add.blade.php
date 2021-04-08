@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Formulaire d'enregistrement des compte</div>
                <div class="card-body">
                    @if(isset($confirmation))
                        @if($confirmation == 1)
                              <div class="alert alert-success">Compte ajouter</div>
                          @else
                            <div class="alert alert-danger">Compte non ajouter</div>
                        @endif
                        
                   @endif
                    <form method="POST" action="{{ route('persistcompte')}}">
                        @csrf
                    <div class="form-group">
                        <label class="control-label" for="numero">Numero du compte</label>
                        <input class="form-control"  type="text" name="numero" id="numero"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="solde">Solde du compte</label>
                        <input class="form-control"  type="text" name="solde" id="solde"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="nom">Choisissez un client</label>
                        <select class="form-control" name="clients_id" id="clients_id">
                            <option value="0">Faite un choix</option>
                            @foreach($clients as $client)
                            <option value="{{ $client->id}}">{{ $client->nom}} {{ $client->prenom}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-success" type="submit" name="envoyer" id="envoyer" value="Envoyer"/>
                        <input class="btn btn-danger" type="reset" name="annuler" id="annuler" value="Annuler"/>
                    </div>
                    </form>

                    

 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
