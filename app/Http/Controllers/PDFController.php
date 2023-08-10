<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Credit;
use App\Models\Client;
use App\Models\User;
use PDF;
class PDFController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($id)
    {
    // Retrieve the credit with the given $id
    $credit = Credit::find($id);

    // Check if the credit exists
    if (!$credit) {
        abort(404); // Or handle the case where the credit is not found
    }
        // Check if the credit has a user associated with it
        if ($credit->id_user) {
            // If the credit has a user associated, unset the id_user attribute from the $credit object
            unset($credit->id_user);
        }

    // Retrieve the client associated with the credit using the relationship
    $client = $credit->client;
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

        $data = [
            'title' => 'Welcome to dabroufeyachnekteb.com',
            'date' => date('m/d/Y'),
            'credit' => $credit,
            'client' => $client,

            // Now, you can access the client attributes
            $clientName = $client->nom,
            $clientStatus = $client->etat,
            $clientTel = $client->telClient,
            $clientAddress = $client->adresse,
            $clientVille = $client->ville,
            $clientCodePostal = $client->codePostal,
            $clientCreditCarte = $client->carteCredit,
            $clientSalary = $client->salaire,
            $clientEmployeur = $client->employeur,
            $clientTypeCompte = $client->typeCompte,
            $clientPoste = $client->poste,
        ]; 
            
        $pdf = PDF::loadView('credits.pdf', $data);
     
        return $pdf->download('credits.pdf');
    }
}

