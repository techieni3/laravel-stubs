<?php

declare(strict_types=1);

namespace TechieNi3\LaravelStubs\Providers;

use Illuminate\Support\ServiceProvider;
use TechieNi3\LaravelStubs\Console\Commands\StubsPublishCommand;

final class StubsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands(
                commands: [
                    StubsPublishCommand::class,
                ],
            );
        }
    }
}
