<?php

declare(strict_types=1);

namespace FrontPadApi\Domain\Dto\Responses\Order;

final readonly class OrderResponse
{
    public function __construct(
        public string $result,
        public string $order_id,
        public string $order_number,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['result'] ?? '',
            $d['order_id'] ?? '',
            $d['order_number'] ?? '',
        );
    }
}
