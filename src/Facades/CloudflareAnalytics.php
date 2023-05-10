<?php

namespace Centrust\CloudflareAnalytics\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Centrust\CloudflareAnalytics\CloudflareAnalytics
 */
class CloudflareAnalytics extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Centrust\CloudflareAnalytics\CloudflareAnalytics::class;
    }
}
