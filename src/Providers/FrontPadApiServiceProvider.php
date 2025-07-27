<?php

declare(strict_types=1);

namespace FrontPadApi\Providers;

use FrontPadApi\Application\Contracts\Http\ApiClientInterface;
use FrontPadApi\FrontPadApiClient;
use FrontPadApi\Infrastructure\Http\GuzzleApiClient;
use Illuminate\Contracts\Config\Repository as ConfigRepo;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\RequestFactoryInterface;

class FrontPadApiServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/frontpad-api.php' => config_path('frontpad-api.php'),
            ], 'frontpad-api-config');
        }
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        /** @var ConfigRepo $config */
        $config = $this->app['config'];

        $this->app->singleton(RequestFactoryInterface::class, fn () => new Psr17Factory);

        // 1) low-level HTTP client
        $this->app->singleton(ApiClientInterface::class, function () use ($config) {
            return GuzzleApiClient::build(
                baseUri: $config->get('frontpad-api.base_uri'),
                timeout: (float) $config->get('frontpad-api.timeout'),
                logger: $this->app->make(\Psr\Log\LoggerInterface::class)
            );
        });

        // 4) facade-like main client
        $this->app->singleton(FrontPadApiClient::class, fn () => new FrontpadApiClient(
            $this->app->make(ApiClientInterface::class),

        ));

        $this->app->alias(FrontpadApiClient::class, 'frontpad-api');
    }
}
