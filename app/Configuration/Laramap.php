<?php

namespace App\Configuration;

class Laramap
{
    /**
     * @return array
     */
    public static function scriptVariables()
    {
        return [
            'csrfToken' => csrf_token(),
            'env' => config('app.env'),
            'gmaps_key' => env('GMAPS_KEY'),
            'currentUser' => auth()->user(),
        ];
    }
}
