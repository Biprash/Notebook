<?php

namespace App\Traits;

trait ResponseAPI
{
    public function coreResponse($message, $data=null, $status=200, $isSuccess=true)
    {
        if ($isSuccess)
        {
            return response()->json([
                'message' => $message,
                'error' => false,
                'code' => $status,
                'data' => $data
            ]);
        } else {
            return response()->json([
                'message' => $message,
                'error' => true,
                'code' => $status,
                'data' => $data
            ]);
        }
    }

    public function success($message, $data=null, $status=200)
    {
        return $this->coreResponse($message, $data, $status);
    }

    public function error($message, $status=500)
    {
        return $this->coreResponse($message, null, $status, false);
    }
}
