<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Client;
use App\Compte;
class CompteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add()
    {
        $clients = Client::all();
        return view('compte.add', ['clients' => $clients]);
    }

    public function getAll()
    {
        //Pour la pagination en laravel
        //partis controller  {{ $liste_compte->links() }} apres </table>
        //$liste_compte = compte::paginate(2);
       $liste_compte= Compte::all();
        return view('compte.list', ['liste_compte' => $liste_compte]);
       //return view('compte.list');
        }

    public function edit($id)
    {
        $compte= Compte::find($id);
        return view('compte.edit', ['compte' => $compte]);
    }

    public function update(Request $request)
    {
        //recuper les infos du medcin apartir de l'identifiant
        $compte= Client::find($request->id);
        $compte->numero = $request->numero; 
        $compte->solde= $request->solde;
        $compte->clients_id= $request->clients_id;
        $compte->users_id= Auth::id();
        $result = $compte->save(); // 1ou 0
        return redirect('/compte/getAll');
    }

    public function delete($id)
    {
        $compte= Compte::find($id);
        if($compte!=null)
        {
            $compte->delete();
        }
        return redirect('/compte/getAll');
    }

    public function persist(Request $request)
    {
        $compte= new Compte();
        $compte->numero = $request->numero; 
        $compte->solde= $request->solde;
        $compte->clients_id= $request->clients_id;
        $compte->users_id= Auth::id();

        $result = $compte->save(); // 1ou 0
        return view('compte.add', ['confirmation' =>$result]);
    }
}


