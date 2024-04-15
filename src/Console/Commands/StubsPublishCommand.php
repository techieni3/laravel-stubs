<?php

declare(strict_types=1);

namespace TechieNi3\LaravelStubs\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\ConfirmableTrait;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\SplFileInfo;

final class StubsPublishCommand extends Command
{
    use ConfirmableTrait;

    protected $signature = 'publish:stubs {--force : Overwrite any existing files}';

    protected $description = 'Publish all stubs that are available for customization';

    public function handle(): int
    {
        if ( ! $this->confirmToProceed()) {
            $this->output->error(
                message: 'Cannot publish stubs without a confirmation.',
            );

            return self::FAILURE;
        }

        if ( ! is_dir($stubsPath = $this->laravel->basePath('stubs'))) {
            (new Filesystem())->makeDirectory($stubsPath);
        }

        $files = collect(File::files(__DIR__.'/../../../stubs'))
            ->unless($this->option('force'), fn ($files) => $this->unpublished($files));

        $published = $this->publish($files);

        $this->info("{$published} / {$files->count()} stubs published.");

        return self::SUCCESS;
    }

    public function unpublished(Collection $files): Collection
    {
        return $files->reject(fn (SplFileInfo $file) => file_exists($this->targetPath($file)));
    }

    public function publish(Collection $files): int
    {
        return $files->reduce(function (int $published, SplFileInfo $file) {
            file_put_contents($this->targetPath($file), file_get_contents($file->getPathname()));

            return $published + 1;
        }, 0);
    }

    public function targetPath(SplFileInfo $file): string
    {
        return "{$this->laravel->basePath('stubs')}/{$file->getFilename()}";
    }
}
