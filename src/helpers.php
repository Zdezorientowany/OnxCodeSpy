<?php

use Illuminate\Support\Facades\Http;

if (!function_exists('spyOn')) {
    function spyOn($object, $recurention_depth = 1)
    {
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);

        $file = $backtrace[0]['file'];
        $line = $backtrace[0]['line'];

        try {
            $dataContent = [
                'file' => $file,
                'line' => $line,
                'data' => json_encode(serializeObject($object, $recurention_depth)),
            ];

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->post('host.docker.internal:8100/api/spies/', $dataContent);

            if ($response->successful()) {
                return $response->json();
            } else {
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

    function serializeObject($object, int $rD = 1, int $n = 0)
    {
        if (!is_object($object)) {
            return json_encode($object);
        }

        $reflectionClass = new ReflectionClass(get_class($object));
        $properties = $reflectionClass->getProperties();
        $data = [
            'class' => get_class($object),
            'properties' => [],
        ];

        foreach ($properties as $property) {
            if ($property->isStatic()) {
                continue;
            }
            $property->setAccessible(true);
            $value = $property->getValue($object);

            if (is_object($value)) {
                if ($n < $rD) {
                    $value = serializeObject($value, $rD, $n + 1);
                } else {
                    $value = get_class($value);
                }
            } elseif (is_resource($value)) {
                $value = get_resource_type($value);
            }

            $data['properties'][$property->getName()] = $value;
        }

        return $data;
    }
}

