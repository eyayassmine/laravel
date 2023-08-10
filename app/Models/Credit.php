<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model

{

    protected $fillable = [
        'id_client',
        'id_user',
        'typec',
        'montant',
        'datedebut',
        'duree',
        'remboursement',
        'ref_bancaire',
        'nb_chevaux',
        'status',
        'datefin',

    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }
        // Define the relationship with the User model
        public function user()
        {
            return $this->belongsTo(User::class, 'id_user');
        }

    public function avis()
    {
        return $this->hasMany(Avi::class, 'id_credit', 'id');
    }

}
