<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Svedok;
use App\Http\Resources\SvedokCollection;

class SudijaSvedokController extends Controller
{
    public function index($sudija_id)
    {
        $svedok = Svedok::get()->where('sudija', $sudija_id);
        if (count($svedok) == 0)
            return response()->json('Data not found', 404);
        return new SvedokCollection($svedok);
    }
}
