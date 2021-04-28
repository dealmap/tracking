<?php

namespace Dealmap\Tracking\Facades;

use Illuminate\Support\Facades\Facade;

class Tracking extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'tracking';
    }
}