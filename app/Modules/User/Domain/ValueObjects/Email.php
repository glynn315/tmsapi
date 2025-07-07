<?php

namespace App\Modules\User\Domain\ValueObjects;

use InvalidArgumentException;

final class Email
{
    private string $value;

    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new InvalidArgumentException('Email cannot be empty.');
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
