<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;

class AccountController extends Controller
{
    public function login(Request $request)
    {  
        try { 
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
            if (Auth::attempt(['email' => $credentials["email"], 'password' => $credentials["password"]])) {
                $request->session()->regenerate();
                $user = User::where('email', $credentials["email"])->first();
                // $user->assignRole($user->id);
                Auth::login($user, $remember = true);
   
                $request->session()->put('triethic', [
                    'token' => $user->remember_token,
                    'roles' => $user->getRoleNames(),
                    'user' => [
                        'id'    => $user->id,
                        'email' => $user->email,
                    ],
                ]);
                return response()->json(['result' => $user, 200]);
                // return redirect()->route('client');
            }
        }catch(ValidationException $e) {
            return response()->json(['status' => false, 'message' => '', 'result' => []], 200);
        }
        return response()->json(['status' => false, 'message' => '', 'result' => []], 401);
    }

    // public function assignRole(int $id)
    // {
    //     if($id === 8){
    //         $user = User::find($id);
    //         $user->assignRole('admin');
    //     } else {
    //         $user = User::find($id);
    //         $user->assignRole('client');
    //     }

    // }





//     use App\Models\User;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;

// class UserController extends Controller
// {
//     public function assignRole()
//     {
//         $user = User::find(1);
//         $user->assignRole('admin');
//     }

//     public function checkPermission()
//     {
//         $user = User::find(1);

//         if ($user->can('edit posts')) {
//             // The user has the permission
//         }
//     }
        // $request->authenticate();

        // $result = array_merge($result, ['token' => $formRequest->session()->token()]);
        // return $this->openSession($request);

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['status' => false, 'message' => '', 'result' => []], 200);
        //return redirect()->route('welcome');
    }
}