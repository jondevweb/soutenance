<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Models\Attestation;
// use App\Helpers\Pdf;
// use Illuminate\Filesystem\Filesystem;

class DocumentController extends Controller
{  
    public function showAttestation()
    {    
        $attestation = Attestation::where('pointcollecte_id', 1712)->get();
        return response()->json(['result' => $attestation]);
    }

    // public function showAttestation(int $id)
    // {    
    //     $attestation = Attestation::where('pointcollecte_id', $id)->get();
    //     $attestation->checkPermission($id);
    //     return response()->json(['result' => $attestation]);
    // }

    // public function checkPermission(int $id)
    // {
    //     $user = User::find($id);
    //     if ($user->can('edit')) {
    //         $create = 'create';
    //     }else {
    //         $download= 'download';
    //     }
    // }
}