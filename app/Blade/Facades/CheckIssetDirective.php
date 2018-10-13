<?php

namespace App\Blade\Facades;

use Illuminate\Support\Facades\Facade;

final class CheckIssetDirective extends Facade 
{
    protected static function getFacadeAccessor()
    {
        return 'check.isset.diretive';
    }
}