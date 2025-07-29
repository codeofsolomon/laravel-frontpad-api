<?php

declare(strict_types=1);

namespace FrontPadApi\Application\Services;

use FrontPadApi\Application\Contracts\Http\ApiClientInterface;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\RequestFactoryInterface;

abstract class BaseService
{
    public function __construct(
        protected readonly ApiClientInterface $api,
        protected readonly RequestFactoryInterface $requestFactory,
    ) {}

    final protected function authorizedRequest(
        string $method,
        string $uri,
        array $options = []
    ): mixed {
        $request = $this->requestFactory
            ->createRequest($method, $uri);

        $options['secret'] = env('FRONT_PAD_SECRET');

        if ($method !== 'GET') {
            $body = http_build_query($options);
            $request = $request
                ->withHeader('Content-Type', 'application/x-www-form-urlencoded')
                ->withBody(Utils::streamFor($body));
        } elseif ($options) {
            $request = $request->withUri(
                $request->getUri()->withQuery(http_build_query($options))
            );
        }

        $response = $this->api->send($request);

        return json_decode((string) $response->getBody(), true);
    }
}
