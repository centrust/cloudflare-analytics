<?php

namespace Centrust\CloudflareAnalytics\Commands;

use Illuminate\Console\Command;

class CloudflareAnalyticsCommand extends Command
{
    public $signature = 'cloudflare-analytics';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
