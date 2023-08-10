<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
        'nom',
        'etat',
        'telClient',
        'adresse',
        'ville',
        'codePostal',
        'codePostal',
        'carteCredit',
        'salaire',
        'employeur',
        'typeCompte',
        'poste',
    ];

    public function credits()
    {
        return $this->hasMany(Credit::class);
    }
    
}
