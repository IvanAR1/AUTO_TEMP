<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
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
}
