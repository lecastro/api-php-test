<?php

declare(strict_types=1);

namespace Usecase\Transaction\Create\DTO;

class OutputTransactionDTO
{
    public function __construct(
        public readonly string $id,
        public readonly float $value,
        public readonly string $payer,
        public readonly string $payee,
        public readonly string $status,
        public readonly string $createdAt,
    ) {
    }
}
