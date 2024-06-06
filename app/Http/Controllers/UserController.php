<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Entreprise;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Inertia\Inertia;

class UserController extends Controller
{

    public function show(User $user)
    {
        return Inertia::render('User/Show', [
          'user' => 'hello'
        ]);
    }
    /**
     * Show the profile for a given user.
     */
    // public function show(string $id): View
    public function showUser(Request $request)
    {
        // if (Auth::check()) {
            $user = User::where('id', 230)->get();
            // $request->session()->put('triethic', [
            //     'token' => $user->remember_token,
            //     'roles' => $user->getRoleNames(),
            //     'user' => [
            //         'id'    => $user->id,
            //         'email' => $user->email,
            //     ],
            // ]);
            // $user = Auth::user();
            // $session = $user->getRoleNames();
            // $request->session()->regenerate();
            // $user = User::where('email', $credentials["email"])->first();


            // $request->session()->put('triethic', [
            //     'token' => 'hello',
            //     // 'roles' => $user->getRoleNames(),
            //     // 'user' => [
            //     //     'id'    => $user->id,
            //     //     'email' => $user->email,
            //     // ],
            // ]);
            // $value = $request->session()->get('triethic');
            return response()->json(['result' => $user]);
            // return response()->json(['result' => ['user' => $user, 'session' => $session]]);
            // return response()->json(['status' => true, 'message' => '', 'result' => $user], 200);
            // dd($request);
            // return view('client/client',[
            //     'user' => $user,
            // ]);
        // } else {
        //     return view('welcome');
        // }
    }

    public function entreprise(Request $Request)
    {    
        if (Auth::check()) {
            $entreprise = Entreprise::where('id', $Request->id)->get();
            return response()->json(['result' => $entreprise]);
        } else {
            return response()->json(['result' => 'Veuillez vous identifier']);
        }
    }

    public function showEntreprise(array $array)
    {    
        $entreprise = Entreprise::where('id', $array[0])->get();
        return $entreprise;
    }

    public function how(Request $request)
    {

        if (Auth::check()) {
            // $user = Auth::user();

            // $user = User::where('id', 230)->get();
            // dd($request->session()->get('triethic'));


            // return response()->json(['result' => $user]);
            // return response()->json(['status' => true, 'message' => '', 'result' => $user], 200);
            $user = $request->session()->get('trietic')['user'];
            dd($user);
            return view('client/client',[
                'user' => $user
            ]);
        } else {
            return view('welcome');
        }
    }
}

