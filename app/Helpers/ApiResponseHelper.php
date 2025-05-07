<?php

namespace App\Helpers;

class ApiResponseHelper
{
    public static function success($message = 'Success', $code = 200, $data = [])
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data
        ], $code);
    }

    public static function error($message = 'Something went wrong', $code = 500, $errors = [])
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors'  => $errors
        ], $code);
    }
}
