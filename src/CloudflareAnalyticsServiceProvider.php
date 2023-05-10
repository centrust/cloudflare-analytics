<?php

namespace Centrust\CloudflareAnalytics;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Centrust\CloudflareAnalytics\Commands\CloudflareAnalyticsCommand;

class CloudflareAnalyticsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('cloudflare-analytics')
            ->hasConfigFile()
            ->hasMigration('create_cloudflare-analytics_table');
    }
}
