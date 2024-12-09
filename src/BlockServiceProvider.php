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

    public function packageBooted(): void
    {
        new Registrar();
    }
}
