<?php

namespace App\Services;

use App\Models\Platform;

class PlatformFind
{
    protected $host;

    public function __construct()
    {
        $host = config('currenturl');
        $this->host = $host;
    }


    public function model()
    {
        $host = config('currenturl');
        if (Platform::all()->contains('name', $host)) {
            $platform = Platform::where('name', $host)->get()->first();
            return $platform;
        } else {
            $platform = Platform::create([
                'name' => config('currenturl'),
            ]);
            return $platform;
        }
    }
}
