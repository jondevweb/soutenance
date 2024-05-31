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

}