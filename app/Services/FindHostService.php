<?php

namespace App\Services;

use App\Models\Platform;

class FindHostService
{
    protected $host;

    public function __construct(string $host)
    {
        $this->host = $host;
    }


    public function hostCheck($host)
    {
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
