<?php

declare(strict_types=1);

namespace FrontPadApi\Application\Services;

use FrontPadApi\Constants;
use FrontPadApi\Domain\Dto\Responses\Menu\Product;

final class MenuService extends BaseService
{
    public function getProducts(): Product
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::GET_PRODUCTS,
            [],
        );

        return Product::fromArray($response);
    }

    public function getStops(): Product
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::GET_STOPS,
            [],
        );

        return Product::fromArray($response);
    }
}
