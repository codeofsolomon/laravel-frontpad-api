<?php

declare(strict_types=1);

namespace FrontPadApi\Domain\Dto\Requests\Customer;

use FrontPadApi\Domain\Dto\Requests\BaseRequest;

class GetClientRequest extends BaseRequest
{
    public function __construct(
        public string $client_phone
    ) {}
}
