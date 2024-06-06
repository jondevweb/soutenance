<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\CollecteController;
use App\Http\Controllers\UserController;

class ViewController extends Controller
{
    public function showView(Request $request)
    {  
        if(Auth::check()){
            $user = Auth::user();
            $collecteId = app(CollecteController::class)->showId([$user->id]);
            $user->clientId = $collecteId;
            $entreprise = app(UserController::class)->showEntreprise([$collecteId]);
            $user->pointCollecte = $entreprise;
            return view('client/client', compact('user'));
        } else {
            return view('welcome');
        }
    }
}