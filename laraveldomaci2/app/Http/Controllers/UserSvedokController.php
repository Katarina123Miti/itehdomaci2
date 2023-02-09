<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Svedok;
use App\Http\Resources\SvedokCollection;

class UserSvedokController extends Controller
{
    public function index($user_id)
    {
        $svedok = Svedok::get()->where('user', $user_id);
        if (count($svedok) == 0)
            return response()->json('Data not found', 404);
        return new SvedokCollection($svedok);
    }
    public function mysvedok()
    {
        if(auth()->user()->isAdmin())
            return response()->json('You are not allowed to have svedoks.');  
        $svedok = Svedok::get()->where('user', auth()->user()->id);
        if (count($svedok) == 0)
            return response()->json('Data not found', 404);
        return new SvedokCollection($apprat);

    }
}
