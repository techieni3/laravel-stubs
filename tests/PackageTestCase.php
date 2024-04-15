<?php

declare(strict_types=1);

namespace TechieNi3\LaravelStubs\Tests;

use Orchestra\Testbench\TestCase;
use TechieNi3\LaravelStubs\Providers\StubsServiceProvider;

class PackageTestCase extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            StubsServiceProvider::class,
        ];
    }
}
