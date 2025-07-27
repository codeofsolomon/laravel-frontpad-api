<?php

declare(strict_types=1);

namespace FrontPadApi\Application\Services;

use FrontPadApi\Constants;
use FrontPadApi\Domain\Dto\Requests\CreateOrder\NewOrderRequest;
use FrontPadApi\Domain\Dto\Responses\Order\OrderResponse;

final class OrderService extends BaseService
{
    /**
     * Summary of createOrder
     */
    public function createOrder(NewOrderRequest $request): OrderResponse
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::NEW_ORDER,
            $request->toArray(),
        );

        return OrderResponse::fromArray($response);
    }
}
