<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Rule;
// use App\Helpers\IorModelTraits;

class Entreprise extends Model
{
    use HasFactory;
    protected $fillable = [
        'raison_sociale',
        'siret',
        'adresse_administrative'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'client_user', 'client_id', 'user_id');
    }

}