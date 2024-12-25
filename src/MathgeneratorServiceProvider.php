<?php

namespace Teguhpermadi\Mathgenerator;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Teguhpermadi\Mathgenerator\Commands\MathgeneratorCommand;
use Spatie\LaravelPackageTools\Commands\InstallCommand;

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
            ->hasConfigFile(['mathgenerator'])
            ->hasViews()
            // ->hasMigration('create_mathgenerator_table')
            ->hasMigrations([
                // 'create_mathgenerator_table',
                'create_addition_world_problems_table',
            ])
            // ->hasCommand(MathgeneratorCommand::class)
            ->hasCommands([
                MathgeneratorCommand::class,
            ])
            ->hasRoute('web') // Ini akan otomatis mencari file routes/web.php
            ->hasInstallCommand(function(InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishAssets()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->copyAndRegisterServiceProviderInApp()
                    ->askToStarRepoOnGitHub('teguhpermadi/mathgenerator');
            });
    }
}
