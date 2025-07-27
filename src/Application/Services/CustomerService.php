<?php

declare(strict_types=1);

namespace FrontPadApi\Application\Services;

use FrontPadApi\Constants;
use FrontPadApi\Domain\Dto\Requests\Customer\GetClientRequest;
use FrontPadApi\Domain\Dto\Responses\Customer\Customer;

final class CustomerService extends BaseService
{
    /**
     * Summary of getClient
     */
    public function getClient(GetClientRequest $request): Customer
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::GET_CLIENT,
            $request->toArray(),
        );

        return Customer::fromArray($response);
    }
}
