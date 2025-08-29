<?php

declare(strict_types=1);

namespace Effectra\LaravelBlog\Providers;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class LaravelSupportTicketServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('support-ticket')
            ->hasConfigFile('support-ticket')
            ->hasMigrations([
                'create_support_tickets_table',
                'create_support_tickets_responses_table'
            ])
            ->hasInstallCommand(function (InstallCommand $command): void {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToStarRepoOnGitHub('effectra/laravel-support-ticket');
            });
    }
}