<?php

namespace App\Support\Facades;

use Illuminate\Support\Facades\Facade;

class BasicAuth extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'basic_auth';
    }
}