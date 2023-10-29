<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Routing\Controller as BaseController;

class ApiBaseController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function successResponse($data, $message = "", $status = 200)
    {
        return response()->json(compact('data', 'message'), $status);
    }

    public function errorResponse($message = "", $data = null, $status = 400)
    {
        return response()->json(compact('data', 'message'), $status);
    }




}
