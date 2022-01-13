<?php

namespace App\Http\Traits;

use Illuminate\Support\Collection;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use PhpParser\ErrorHandler\Collecting;

trait ApiResponser
{



    private function successResponser($data, $code)
    {
        return response()->json($data, $code);
    }

    protected function errorResponser($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

 
    protected function showAll(Collection $collection, $code = 200)
    {
        return $this->successResponser($collection, $code);
    }
    protected function showOne(Model $instance, $code = 200)
    {
        return $this->successResponser(['data' => $instance], $code);
    }
 
}
