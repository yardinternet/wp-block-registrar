<?php

declare(strict_types=1);

namespace Yard\Block;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BlockServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('blocks')
            ->hasConfigFile();
    }

    public function packageRegistered(): void
    {
        $this->app->bind(Registrar::class, function () {
            return new Registrar();
        });
    }

    public function packageBooted(): void
    {
        $this->app->make(Registrar::class);
    }
}
