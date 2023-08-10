<?php

namespace App\Http\Controllers;
use App\Models\Credit;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;


class CreditController extends Controller
{
    
        /**
     * Display all credits
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $credits = Credit::latest()->paginate(10);

        return view('credits.index', compact('credits'));
    }

        /**
     * Show form for creating credit
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        
        return view('credits.create');
    }


    /**
     * Store a newly created credit
     * 
     * @param Credit $credit
     * 
     * @return \Illuminate\Http\Response
     */

    public function store(Credit $credit, Request $request)
    {
        // Define the validation rules without the nb_chevaux rule
        $rules = [
            'id_client' => 'required|exists:clients,id',
            'typec' => 'required|in:1,2',
            'montant' => 'required|numeric',
            'datedebut' => 'required|date',
            'duree' => 'required|integer',
            'remboursement' => 'required|numeric',
            'ref_bancaire' => 'required|string',
            'datefin' => 'required|date',
        ];

        // Conditionally add the nb_chevaux validation rule based on typec
        if ($request->input('typec') == 1) {
            $rules['nb_chevaux'] = 'required|string';
        } else {
            $rules['nb_chevaux'] = 'nullable'; // Set it to nullable
            $request->merge(['nb_chevaux' => null]);
        }

        // Validate the request data with the rules
        $validatedData = $request->validate($rules);



        // Validate nb_chevaux using ctype_digit
        if (!is_null($validatedData['nb_chevaux'])) {
            $s1 = $validatedData['nb_chevaux'];
            $a = strlen($s1);
            $condition = true;
            for ($i = 0; $i < $a; $i++) {
                if (!ctype_digit($s1[$i])) {
                    $condition = false;
                    break; // Exit the loop since we found a non-numeric character
                }
            }

            if (!$condition) {
                return redirect()->back()->withErrors(['nb_chevaux' => 'error: nombre de chevaux must be a number']);
            }
        }

        // Rest of your logic to create the credit
        // ...

    
        // Get the authenticated user's ID
        $id_user = Auth::id();
        $status = 0;

        // Create the credit
        $credit = Credit::create([
            'id_client' => $validatedData['id_client'],
            'id_user' => $id_user,
            'typec' => $validatedData['typec'],
            'montant' => $validatedData['montant'],
            'datedebut' => $validatedData['datedebut'],
            'duree' => $validatedData['duree'],
            'remboursement' => $validatedData['remboursement'],
            'ref_bancaire' => $validatedData['ref_bancaire'],
            'nb_chevaux' => $validatedData['nb_chevaux'],
            'status' => $status,
            'datefin' => $validatedData['datefin'],


        ]);
    
        // Rest of your code...
    

        return redirect()->route('credits.index')
            ->withSuccess(__('Credit created successfully.'));
    }

    
    /**
     * Show credit data
     * 
     * @param Credit $credit
     * 
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
            // Retrieve the credit
    $credit = Credit::find($id);

    // Check if the credit exists
    if (!$credit) {
        abort(404); // Or handle the case where the credit is not found
    }

    // Retrieve the client associated with the credit using the relationship
    $client = $credit->client;

    // Now, you can access the client attributes
    $clientName = $client->nom;
    $clientStatus = $client->etat;
    $clientTel = $client->telClient;
    $clientAddress = $client->adresse;
    $clientVille = $client->ville;
    $clientCodePostal = $client->codePostal;
    $clientCreditCarte = $client->carteCredit;
    $clientSalary = $client->salaire;
    $clientEmployeur = $client->employeur;
    $clientTypeCompte = $client->typeCompte;
    $clientPoste = $client->poste;
    // And so on...

    // Return the view or do any other processing
    return view('credits.show', compact('credit', 'client'));

    }

    /**
     * Edit credit data
     * 
     * @param Credit $credit
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Credit $credit) 
    {
        return view('credits.edit', [
            'credit' => $credit,

        ]);
    }


       /**
     * Update credit data
     * 
     * @param Credit $credit
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Credit $credit, Request $request) 
    {
        $rules = [
            'id_client' => 'required|exists:clients,id',
            'typec' => 'required|in:1,2',
            'montant' => 'required|numeric',
            'datedebut' => 'required|date',
            'duree' => 'required|integer',
            'remboursement' => 'required|numeric',
            'ref_bancaire' => 'required|string',
            'datefin' => 'required|date',

        ];

        // Conditionally add the nb_chevaux validation rule based on typec
        if ($request->input('typec') == 1) {
            $rules['nb_chevaux'] = 'required|string';
        } else {
            $rules['nb_chevaux'] = 'nullable'; // Set it to nullable
        }

        // Validate the request data with the rules
        $validatedData = $request->validate($rules);

        // Validate nb_chevaux using ctype_digit
        if (!is_null($validatedData['nb_chevaux'])) {
            $s1 = $validatedData['nb_chevaux'];
            $a = strlen($s1);
            $condition = true;
            for ($i = 0; $i < $a; $i++) {
                if (!ctype_digit($s1[$i])) {
                    $condition = false;
                    break; // Exit the loop since we found a non-numeric character
                }
            }

            if (!$condition) {
                return redirect()->back()->withErrors(['nb_chevaux' => 'error: nombre de chevaux must be a number']);
            }
        }

        $status = $credit->status; // Assuming you're retrieving the status from the $credit object
        $canUpdateCredit;

        if ($status == -1 || $status == 0)
        {
            $canUpdateCredit = true;
        }
        else
        {
            $canUpdateCredit = false;
        }

        if ($canUpdateCredit == false) {
            return redirect()->back()->withErrors(['datefin' => 'error: error: you don\'t have the right to update the credit']);
       }

       $status = 0;

    
        $credit->update([
            'id_client' => $validatedData['id_client'],
            'typec' => $validatedData['typec'],
            'montant' => $validatedData['montant'],
            'datedebut' => $validatedData['datedebut'],
            'duree' => $validatedData['duree'],
            'remboursement' => $validatedData['remboursement'],
            'ref_bancaire' => $validatedData['ref_bancaire'],
            'nb_chevaux' => $validatedData['nb_chevaux'],
            'status' => $status,
            'datefin' => $validatedData['datefin'],

        ]);

        return redirect()->route('credits.index')
            ->withSuccess(__('Credit updated successfully.'));
    }



        /**
     * Delete credit data
     * 
     * @param Credit $credit
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Credit $credit) 
    {
        $credit->delete();
        
        //Credit::findOrFail($request['id'])->delete();
        return redirect()->route('credits.index')
            ->withSuccess(__('Credit deleted successfully.'));
    }

    ////



}
