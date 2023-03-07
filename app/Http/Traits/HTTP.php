<?php

namespace App\Http\Traits;

/* trait HTTP
{
    public function toJson(array $array, string $status = 'OK')
    {
        $data = array(
            'status' => $status,
            'code' => 200,
        );

        if($status === 'error')
        {
            $data = array(
                'status' => 'error',
                'code' => 401,
            );
        }
        $array = array_merge($data, $array);
        return response()->json($array,$data['code']);
    }

    protected function specialJSON(mixed $data)
    {
        return response()->json($data, 200);
    }
} */