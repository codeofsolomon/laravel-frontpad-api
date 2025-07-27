<?php

namespace FrontPadApi\Domain\Exceptions;

abstract class FrontPadApiException extends \RuntimeException
{
    public function __construct(string $message = '', int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message ?: static::class, $code, $previous);
    }
}
