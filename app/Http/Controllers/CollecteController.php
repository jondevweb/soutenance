<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Pointcollecte;
use App\Models\Passage;
// use App\Models\Collecte;
// use App\Models\Document;
// use Illuminate\Support\Carbon;
// use App\Helpers\Paths;
// use Illuminate\Filesystem\Filesystem;
// use App\Helpers\Files;
// use App\Helpers\HZip;

class CollecteController extends Controller
{
    public function showId(array $array)
    {    
        $collecteId = DB::table('client_user')->select('client_id')->where('user_id', '=', $array[0])->get();
        return $collecteId[0]->client_id;
    }

    public function showCollecte(array $array)
    {    
        $entreprise = PointCollecte::where('id', $array[0])->get();
        return $entreprise;
    }

    public function showPassage()
    {    
        $passage = Passage::where('pointcollecte_id', 1712)->get();
        return response()->json(['result' => $passage]);
    }
}
