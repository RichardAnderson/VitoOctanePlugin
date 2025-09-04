<?php

namespace App\Vito\Plugins\RichardAnderson\VitoOctanePlugin;

use App\Plugins\RegisterSiteFeature;
use App\Plugins\RegisterSiteFeatureAction;
use App\Plugins\AbstractPlugin;

class Plugin extends AbstractPlugin
{
    protected string $name = 'Octane Plugin';

    protected string $version = '1.0.0';

    protected string $description = 'Vito Octane Plugin';

    protected string $repo = 'https://github.com/vitodeploy/laravel-octane-plugin/';

    public function boot(): void
    {
        parent::boot();

        RegisterSiteFeature::make('php-blank', 'laravel-octane')
            ->label('Laravel Octane')
            ->description('Enable Laravel Octane for this site')
            ->register();

        RegisterSiteFeatureAction::make('php-blank', 'laravel-octane', 'enable')
            ->label('Enable')
            ->handler(Enable::class)
            ->register();

        RegisterSiteFeatureAction::make('php-blank', 'laravel-octane', 'disable')
            ->label('Disable')
            ->handler(Disable::class)
            ->register();
    }
}
