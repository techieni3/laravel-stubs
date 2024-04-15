<?php

declare(strict_types=1);

use Illuminate\Support\Facades\File;

it('can publish stubs', function (): void {
    $targetStubsPath = $this->app->basePath('stubs');

    File::deleteDirectory($targetStubsPath);

    $this->artisan('publish:stubs')->assertExitCode(0);

    expect("{$targetStubsPath}/model.stub")->toBeFile();
});
