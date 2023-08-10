<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
    
        /**
     * Display all clients
     * 
     * @return \Illuminate\Http\Response
     */
    public function list() 
    {
        $clients = Client::latest()->paginate(10);

        return view('clients.list', compact('clients'));
    }

        /**
     * Show form for creating client
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        return view('clients.ajouter');
    }


    /**
     * Store a newly created client
     * 
     * @param Client $client
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Client $client, Request $request) 
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'etat' => 'required',
            'telClient' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
            'codePostal' => 'required',
            'carteCredit' => 'required',
            'salaire' => 'required',
            'employeur' => 'required',
            'typeCompte' => 'required',
            'poste' => 'required',

        ]);

        
        // Create the client
        $client = Client::create([

            'nom' => $validatedData['nom'],
            'etat' => $validatedData['etat'],
            'telClient' => $validatedData['telClient'],
            'adresse' => $validatedData['adresse'],
            'ville' => $validatedData['ville'],
            'codePostal' => $validatedData['codePostal'],
            'carteCredit' => $validatedData['carteCredit'],
            'salaire' => $validatedData['salaire'],
            'employeur' => $validatedData['employeur'],
            'typeCompte' => $validatedData['typeCompte'],
            'poste' => $validatedData['poste'],

        ]);



        return redirect()->route('clients.list')
            ->withSuccess(__('Client created successfully.'));
    }

    
    /**
     * Show client data
     * 
     * @param Client $client
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client) 
    {
        return view('clients.show', [
            'client' => $client
        ]);
    }

    /**
     * Edit client data
     * 
     * @param Client $client
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client) 
    {
        return view('clients.edit', [
            'client' => $client,

        ]);
    }


       /**
     * Update client data
     * 
     * @param Client $client
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Client $client, Request $request) 
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'etat' => 'required',
            'telClient' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
            'codePostal' => 'required',
            'carteCredit' => 'required',
            'salaire' => 'required',
            'employeur' => 'required',
            'typeCompte' => 'required',
            'poste' => 'required',
        ]);
    
        $client->update([
            'nom' => $validatedData['nom'],
            'etat' => $validatedData['etat'],
            'telClient' => $validatedData['telClient'],
            'adresse' => $validatedData['adresse'],
            'ville' => $validatedData['ville'],
            'codePostal' => $validatedData['codePostal'],
            'carteCredit' => $validatedData['carteCredit'],
            'salaire' => $validatedData['salaire'],
            'employeur' => $validatedData['employeur'],
            'typeCompte' => $validatedData['typeCompte'],
            'poste' => $validatedData['poste'],
        ]);

        return redirect()->route('clients.list')
            ->withSuccess(__('Client updated successfully.'));
    }



        /**
     * Delete client data
     * 
     * @param Client $client
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client) 
    {
        $client->delete();

        return redirect()->route('clients.list')
            ->withSuccess(__('Client deleted successfully.'));
    }




}
