<?php

declare(strict_types=1);

namespace FrontPadApi\Domain\Dto\Responses\Menu;

final readonly class Product
{
    public function __construct(
        public string $result,
        public array $product_id = [],
        public array $name = [],
        public array $price = [],
        public array $sale = [],
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            result: $data['result'],
            name: $data['name'] ?? [],
            product_id: $data['product_id'] ?? [],
            price: $data['price'] ?? [],
            sale: $data['sale'] ?? [],

        );
    }
}
