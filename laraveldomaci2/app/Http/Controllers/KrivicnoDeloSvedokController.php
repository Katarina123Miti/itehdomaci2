<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Svedok;
use App\Http\Resources\SvedokCollection;

class KrivicnoDeloSvedokController extends Controller
{
    public function index($krivicnodelo_id)
    {
        $svedok = Svedok::get()->where('krivicnodelo', $krivicnodelo_id);
        if (count($svedok) == 0)
            return response()->json('Data not found', 404);
        return new SvedokCollection($svedok);
    }
}
