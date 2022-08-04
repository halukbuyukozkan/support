<?php

namespace App\Exceptions;

use Exception;
use App\Services\PlatformFacade;
use Illuminate\Http\JsonResponse;

class PlatformNotFound extends Exception
{
    //
    /**
     * Report the exception
     *
     * @return void
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception as an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function render($request)
    {
        $platform = $request->name;
        return view('errors.404', compact('platform'));
    }
}
