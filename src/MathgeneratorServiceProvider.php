<?php

namespace Teguhpermadi\Mathgenerator;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Teguhpermadi\Mathgenerator\Commands\MathgeneratorCommand;

class MathgeneratorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('mathgenerator')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_mathgenerator_table')
            ->hasCommand(MathgeneratorCommand::class)
            ->hasRoute('web'); // Ini akan otomatis mencari file routes/web.php
    }
}
