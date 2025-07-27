<?php

declare(strict_types=1);

namespace FrontPadApi;

use FrontPadApi\Application\Contracts\Http\ApiClientInterface;
use FrontPadApi\Application\Services\BaseService;
use Illuminate\Support\Str;

class FrontPadApiClient
{
    public function __construct(
        protected ApiClientInterface $api,
    ) {}

    public function __call(string $name, array $arguments): BaseService
    {
        $class = __NAMESPACE__.'\\Application\\Services\\'.Str::studly($name).'Service';

        return new $class(
            $this->api,
            app(\Psr\Http\Message\RequestFactoryInterface::class)
        );
    }
}
