<?php

use Illuminate\Support\Facades\Http;

if ( !function_exists('spyOn') ) {
    function spyOn($object)
    {
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);

        $file = basename($backtrace[0]['file']);
        $line = $backtrace[0]['line'];

        try {
            $jsonObject = json_encode($object);

            $data = [
                'data' => $jsonObject,
                'file' => $file,
                'line' => $line,
            ];

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->post('localhost:8100/api/spies/', $data);

            if ($response->successful()) {
                return $response->json();
            }else{
                return $response;
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Request failed',
                'message' => $e->getMessage(),
                'code' => $e->getCode()
            ], 500);
        }
    }
}


