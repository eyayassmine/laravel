<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Avi extends Model
{
    
    protected $fillable = [
        'id_credit',
        'id_user',
        'contenu',
        'decision',

    ];

    public function credit()
    {
        return $this->belongsTo(Credit::class, 'id_credit');
    }
        // Define the relationship with the User model
        public function user()
        {
            return $this->belongsTo(User::class, 'id_user');
        }
}
