<?php

declare(strict_types=1);

namespace FrontPadApi\Domain\Dto\Responses\Discount;

final readonly class CertificateResponse
{
    public function __construct(
        public string $result,
        public ?string $product_id = null,
        public ?string $name = null,
        public ?string $price = null,
        public ?string $sale = null,
        public ?string $amount = null,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['result'] ?? '',
            $d['product_id'] ?? null,
            $d['name'] ?? null,
            $d['price'] ?? null,
            $d['sale'] ?? null,
            $d['amount'] ?? null,
        );
    }
}
