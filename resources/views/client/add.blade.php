@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Formulaire d'enregistrement des clients</div>
                <div class="card-body">
                    @if(isset($confirmation))
                        @if($confirmation == 1)
                              <div class="alert alert-success">Client ajouter</div>
                          @else
                            <div class="alert alert-danger">Client non ajouter</div>
                        @endif
                        
                   @endif
                    <form method="POST" action="{{ route('persistclient')}}">
                        @csrf
                    <div class="form-group">
                        <label class="control-label" for="nom">Nom du client</label>
                        <input class="form-control"  type="text" name="nom" id="nom"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="prenom">Prenom du client</label>
                        <input class="form-control"  type="text" name="prenom" id="prenom"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="addresse">Addresse du client</label>
                        <input class="form-control"  type="text" name="addresse" id="addresse"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="nom">Telephone du client</label>
                        <input class="form-control"  type="text" name="telephone" id="telephone"/>
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
