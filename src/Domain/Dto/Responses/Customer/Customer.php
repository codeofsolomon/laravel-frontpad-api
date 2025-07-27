<?php

declare(strict_types=1);

namespace FrontPadApi\Domain\Dto\Responses\Customer;

final readonly class Customer
{
    public function __construct(
        public string $result, //
        public string $name,
        public string $street,
        public string $home,
        public string $pod,
        public string $et,
        public string $apart,
        public string $mail,
        public string $descr,
        public string $card,
        public string $sale,
        public string $score,

    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['result'] ?? '',
            $d['name'] ?? '',
            $d['street'] ?? '',
            $d['home'] ?? '',
            $d['pod'] ?? '',
            $d['et'] ?? '',
            $d['apart'] ?? '',
            $d['mail'] ?? '',
            $d['descr'] ?? '',
            $d['card'] ?? '',
            $d['sale'] ?? '',
            $d['score'] ?? '',

        );
    }
}
