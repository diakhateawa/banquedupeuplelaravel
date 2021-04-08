<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add()
    {
        return view('client.add');
    }

    public function getAll()
    {
        //Pour la pagination en laravel
        //partis controller  {{ $liste_clients->links() }} apres </table>
        $liste_clients = Client::paginate(2);
       //$liste_clients= Client::all();
        return view('client.list', ['liste_clients' => $liste_clients]);
       //return view('client.list');
        }

    public function edit($id)
    {
        $client = Client::find($id);
        return view('client.edit', ['client' => $client]);
    }

    public function update(Request $request)
    {
        //recuper les infos du medcin apartir de l'identifiant
        $client = Client::find($request->id);
        $client->nom = $request->nom; 
        $client->prenom = $request->prenom;
        $client->addresse = $request->addresse;
        $client->telephone= $request->telephone;

        $result = $client->save(); // 1ou 0
        return redirect('/client/getAll');
    }

    public function delete($id)
    {
        $client = Client::find($id);
        if($client !=null)
        {
            $client->delete();
        }
        return $this->getAll();
    }

    public function persist(Request $request)
    {
        $client = new Client();
        $client->nom = $request->nom; 
        $client->prenom = $request->prenom;
        $client->addresse = $request->addresse;
        $client->telephone= $request->telephone;

        $result = $client->save(); // 1ou 0
        return view('client.add', ['confirmation' =>$result]);
    }
}
