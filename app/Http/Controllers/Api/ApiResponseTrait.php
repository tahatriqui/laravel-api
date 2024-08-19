<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

trait ApiResponseTrait
{

    public function apiresponse($data = null, $msg = null, $status = null)
    {
        $array = ['data' => $data, 'message' => $msg, "status" => $status];
        return response($array, $status);
    }
}
