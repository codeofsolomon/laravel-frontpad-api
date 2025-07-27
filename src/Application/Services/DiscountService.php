<?php

declare(strict_types=1);

namespace FrontPadApi\Application\Services;

use FrontPadApi\Constants;
use FrontPadApi\Domain\Dto\Requests\Discount\GetCertificateRequest;
use FrontPadApi\Domain\Dto\Responses\Discount\CertificateResponse;

final class DiscountService extends BaseService
{
    /**
     * Summary of getCertificate
     */
    public function getCertificate(GetCertificateRequest $filter): CertificateResponse
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::GET_CERTIFICATE,
            $filter->toArray(),
        );

        return CertificateResponse::fromArray($response);
    }
}
