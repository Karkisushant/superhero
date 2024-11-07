<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;

abstract class Controller
{
    //

    public function sendResponse(array $input,string $message): \Illuminate\Http\JsonResponse
    {
        return Response::json([
            'success' => true,
            'data' => $input,
            'message'=>$message
        ]);
    }

    public function sendSuccess(string $message): \Illuminate\Http\JsonResponse
    {
        return Response::json([
            'success' => true,
            'message'=>$message
        ]);
    }
}
