<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function validIdentity($tokenId, $userRouteId)
    {
        return $tokenId == $userRouteId;
    }

    protected function error($message = 'Undefine')
    {
        return response()->json(['error' => $message], 400);
    }
}
