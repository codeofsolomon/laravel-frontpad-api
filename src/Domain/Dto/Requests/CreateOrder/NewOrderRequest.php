<?php

declare(strict_types=1);

namespace FrontPadApi\Domain\Dto\Requests\CreateOrder;

use FrontPadApi\Domain\Dto\Requests\BaseRequest;

class NewOrderRequest extends BaseRequest
{
    public function __construct(
        public array $product,
        public array $product_kol,
        public ?array $product_mod = null,
        public ?array $product_price = null,
        public ?int $score = null,
        public ?int $sale = null,
        public ?float $sale_amount = null,
        public ?string $card = null,
        public ?string $street = null,
        public ?string $home = null,
        public ?string $pod = null,
        public ?string $et = null,
        public ?string $apart = null,
        public ?string $phone = null,
        public ?string $mail = null,
        public ?string $descr = null,
        public ?string $name = null,
        public ?int $pay = null,
        public ?string $certificate = null,
        public ?int $person = null,
        public ?array $tags = null,
        public ?array $hook_status = null,
        public ?string $hook_url = null,
        public ?string $channel = null,
        public ?string $datetime = null,
        public ?int $affiliate = null,
        public ?int $point = null,
    ) {}
}
