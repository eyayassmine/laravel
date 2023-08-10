<?php

namespace App\Http\Controllers;
use App\Models\Avi;
use App\Models\Credit;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class AviController extends Controller
{
            /**
     * Display all avis
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $avis = Avi::latest()->paginate(10);

        return view('avis.index', compact('avis'));
    }
    
    public function history($id_credit)
    {
        $user = Auth::user();
        // Retrieve the credit along with its associated avis using the relationship
        $credit = Credit::with('avis')->findOrFail($id_credit);

        // Get the authenticated user
        $user = Auth::user();

        // Check if the user has permission to view the history (optional, based on your permissions logic)
        // For example, you can check the user's role here

        // Load the history view and pass the credit and user data
        return view('avis.history', compact('credit', 'user'));
    }

        /**
     * Show form for creating avi
     * 
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) 
    {
        // Retrieve the credit ID from the request or any other source (e.g., route, session, etc.)
        $creditId = $request->input('id_credit'); // Assuming you have 'id_credit' in the form data
        Session::put('creditId', $creditId);

        return view('avis.create');
    }


    /**
     * Store a newly created avi
     * 
     * @param Avi $avi
     * 
     * @return \Illuminate\Http\Response
     */

    public function store(Avi $avi, Request $request)
    {
        // Define the validation rules without the nb_chevaux rule
        $rules = [
            'contenu' => 'required|string',
            //'decision' => 'nullable', // Set it to nullable

        ];

        //$rules['decision'] = 'nullable'; // Set it to nullable

        // Validate the request data with the rules
        // Retrieve the credit ID from the session
        $creditId = Session::get('creditId');

        $credit = Credit::find($creditId);

        //dd($credit);

        $creditstatus = $credit->status;

        
        // Get the authenticated user

        $user = Auth::user();

        //$role = $user->roles;
        //$rolename = $role->name;

//dd($role);

    //if ($user->hasRole('Direction Générale') ) {
   if ($user->hasRole("Direction Générale")) {

        $rules['decision'] = 'required|string|in:accepté,refusé,à réviser';
    } else {
        $rules['decision'] = 'nullable'; // Set it to nullable
        $request->merge(['decision' => null]); // Set the value to null in the request

    }


    $validatedData = $request->validate($rules);

    $canCreateAvis = false;

        switch ($creditstatus) {
            case -1:

                $canCreateAvis = false;   
            
            break;

            case 0:
            if ($user->hasRole("Chef d'agence"))
        {
            $canCreateAvis = true;
            $creditstatus = 1;
            //$credit->status = 1; // Mettez la nouvelle valeur que vous souhaitez assigner ici
        }
            break;
           case 1:
            if($user->hasRole("Direction Exploitations"))
        {
            $canCreateAvis = true;
            $creditstatus = 2;
            //$credit->save(); // Save the updated credit
        }

            break;
            case 2:
                if($user->hasRole("Direction Engagements")
                )
        {
            $canCreateAvis = true;
            $creditstatus = 3;

        }
            break;
        
            case 3:
            if($user->hasRole("Direction Générale"));
        {
                $canCreateAvis = true;
                if ($request->input('decision') == 'à réviser') {
                    $creditstatus = -1;
                } else {
                    $creditstatus = 4;
                }

        }
            break;

            case 4:

                $canCreateAvis = false;   
            
            break;
        }
        
        
        // $condition will be true or false based on the values of $creditstatus and $rolename
        
                   if ($canCreateAvis = false) {
                        return redirect()->back()->withErrors(['contenu' => 'error: error: you don\'t have the right to create an avis yet']);
                   }

/////        
       
        $credit->update([
            'status' => $creditstatus,
        ]);
        
        // Rest of your logic to create the avi
        // ...
            // Get the authenticated user's ID
            $id_user = Auth::id();

    
        // Create the avi
        $avi = Avi::create([

            'id_credit' => $creditId,
            'id_user' => $id_user,
            'contenu' => $validatedData['contenu'],
            'decision' => $validatedData['decision'],
        ]);
    
        // Rest of your code...
    

        return redirect()->route('avis.index')
            ->withSuccess(__('Avi created successfully.'));
    }
        /**
     * Show avi data
     * 
     * @param Avi $avi
     * 
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
            // Retrieve the avi
        $avi = Avi::find($id);

        // Check if the avi exists
        if (!$avi) {
            abort(404); // Or handle the case where the avi is not found
        }

        // Retrieve the client associated with the avi using the relationship
        $credit = $avi->credit;

        // Now, you can access the client attributes
        $id_credit = $credit->id;
        $id_client = $credit->id_client;
        $creditTypec = $credit->typec;
        $creditMontant = $credit->montant;
        $creditDatedebut = $credit->datedebut;
        $creditDuree = $credit->duree;
        $creditRemboursement = $credit->remboursement;
        $creditRefbanc = $credit->ref_bancaire;
        $creditDatefin = $credit->datefin;

        // And so on...

        // Return the view or do any other processing
        return view('avis.show', compact('avi', 'credit'));

    }

    /**
     * Edit avi data
     * 
     * @param Avi $avi
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Avi $avi) 
    {
        return view('avis.edit', [
            'avi' => $avi,

        ]);
    }


       /**
     * Update avi data
     * 
     * @param Avi $avi
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Avi $avi, Request $request) 
    {
        $rules = [
            'contenu' => 'required|string',
        ];


        // Validate the request data with the rules
        // Retrieve the credit ID from the session
        $creditId = Session::get('creditId');

        $credit = Credit::find($creditId);
        $creditstatus = $credit->status;

        // Get the authenticated user

        $user = Auth::user();

        $rolename = $user->role;

    if ($rolename == "Direction Générale" ) {
        $rules['decision'] = 'required|string|in:accepté,refusé,à réviser';
    } else {
        $rules['decision'] = 'nullable'; // Set it to nullable
    }


    $validatedData = $request->validate($rules);

    $canCreateAvis;

        switch ($creditstatus) {
            case -1:

                $canCreateAvis = false;   
            
            break;

            case 0:
            if ($rolename == "Chef d'agence")
        {
            $canCreateAvis = true;
            $creditstatus == 1;

        }
            break;
        
            case 1:
                if($rolename == 'Directoin Exploitations')
                {
                    $canCreateAvis = true;
                    $creditstaus == 2;
                }

            break;
        
            case 2:
                if($rolename == 'Direction Engagements')
                {
                    $canCreateAvis = true;
                    $creditstaus == 3;

                }
            break;
        
            case 3:
            if($rolename == 'Direction Générale');
                {
                        $canCreateAvis = true;
                        if ($request->input('decision') == 'à réviser') {
                            $creditstaus == -1 ;
                        } else {
                            $creditstaus == 4;
                        }

                }
            break;

            case 4:

                $canCreateAvis = false;   
            
            break;
        }
        
        
        // $condition will be true or false based on the values of $creditstatus and $rolename
        
                   if ($canCreateAvis = false) {
                        return redirect()->back()->withErrors(['contenu' => 'error: error: you don\'t have the right to update an avis yet']);
                   }

                               // Get the authenticated user's ID
            $id_user = Auth::id();
    
        $avi->update([

            'id_credit' => $creditId,
            'id_user' => $id_user,
            'contenu' => $validatedData['contenu'],
            'decision' => $validatedData['decision'],
        ]);

        return redirect()->route('avis.index')
            ->withSuccess(__('Avi updated successfully.'));

    }

        /**
     * Delete avi data
     * 
     * @param Avi $avi
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Avi $avi) 
    {
        $avi->delete();
        
        //Avi::findOrFail($request['id'])->delete();
        return redirect()->route('avis.index')
            ->withSuccess(__('Avis deleted successfully.'));
    }

}

    

