<?php

declare(strict_types=1);

namespace SimonAnkele\PipelineQueryCollection\Providers;

use Illuminate\Support\ServiceProvider;

class PipelineQueryCollectionServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/pipeline-query-collection.php' => config_path('pipeline-query-collection.php'),
        ]);
    }
}
