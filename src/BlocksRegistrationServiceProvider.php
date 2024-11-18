<?php

declare(strict_types=1);

namespace Yard\BlocksRegistration;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Yard\BlocksRegistration\Console\BlocksRegistrationCommand;

class BlocksRegistrationServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('wp-blocks-registration')
            ->hasConfigFile()
            ->hasViews()
            ->hasCommand(BlocksRegistrationCommand::class);
    }

    public function packageRegistered(): void
    {
        $this->app->singleton('BlocksRegistration', fn () => new BlocksRegistration($this->app));
    }

    public function packageBooted(): void
    {
        $this->app->make('BlocksRegistration');
    }
}
