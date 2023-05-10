<?php

namespace Centrust\CloudflareAnalytics\Traits;

use Centrust\CloudflareAnalytics\CloudflareAnalytics;

trait HasAnalytics
{


    public function analytics()
    {
        return $this->morphMany(config('cloudflare-analytics.morph_name', 'trackable'));
    }

    public function LogEntry()
    {
      app(CloudflareAnalytics::class)->LogModel($this);
    }


}
