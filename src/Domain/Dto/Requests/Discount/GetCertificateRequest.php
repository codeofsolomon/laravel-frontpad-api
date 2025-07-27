<?php

declare(strict_types=1);

namespace FrontPadApi\Domain\Dto\Requests\Discount;

use FrontPadApi\Domain\Dto\Requests\BaseRequest;

class GetCertificateRequest extends BaseRequest
{
    public function __construct(public string $certificate) {}
}
