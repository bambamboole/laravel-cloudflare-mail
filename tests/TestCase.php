<?php
declare(strict_types=1);

namespace Bambamboole\CloudflareMail\Tests;

use Bambamboole\CloudflareMail\CloudflareMailServiceProvider;
use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * @param  Application  $app
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [
            CloudflareMailServiceProvider::class,
        ];
    }
}
