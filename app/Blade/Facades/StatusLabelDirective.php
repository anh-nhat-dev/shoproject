<?php

namespace App\Blade\Facades;

use Illuminate\Support\Facades\Facade;

final class StatusLabelDirective extends Facade 
{
    protected static function getFacadeAccessor()
    {
        return 'status.diretive';
    }
}