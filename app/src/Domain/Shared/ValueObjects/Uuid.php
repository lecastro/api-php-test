<?php

declare(strict_types=1);

namespace Domain\Shared\ValueObjects;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

class Uuid
{
    public function __construct(protected string $value)
    {
        $this->ensureIsValid($value);
    }

    public static function random(): self
    {
        return new self(RamseyUuid::uuid4()->toString());
    }

    private function ensureIsValid(string $value): void
    {
        if (!RamseyUuid::isValid($value)) {
            throw new InvalidArgumentException(sprintf("<%s> does not allow the value <%s>", static::class, $value));
        }
    }

    public function get(): string
    {
        return $this->value;
    }
    public function __toString(): string
    {
        return $this->value;
    }
}
