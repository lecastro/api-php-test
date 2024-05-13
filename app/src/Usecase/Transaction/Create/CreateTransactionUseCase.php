<?php

declare(strict_types=1);

namespace Usecase\Transaction\Create;

use Domain\Shared\ValueObjects\Uuid;
use Domain\Transaction\Domain\Entities\Transaction;
use Domain\Transaction\Domain\Service\TransactionService;
use Domain\Transaction\Domain\Enums\TransactionStatusEnum;
use Usecase\Transaction\Create\DTO\{
    InputTransactionDTO,
    OutputTransactionDTO
};

class CreateTransactionUseCase
{
    public function __construct(protected TransactionService $service)
    {
    }

    public function execute(InputTransactionDTO $input): OutputTransactionDTO
    {
        $transaction = new Transaction(
            id: null,
            payerId: new Uuid($input->payer),
            payeeId: new Uuid($input->payee),
            amount: $input->amount,
            status: TransactionStatusEnum::CREATED
        );

        $this->service->create($transaction);

        return new OutputTransactionDTO(
            id: $transaction->id->get(),
            value: $transaction->amount,
            payer: $transaction->payerId->get(),
            payee: $transaction->payeeId->get(),
            status: $transaction->status->value,
            createdAt: $transaction->createdAt->format('Y-m-d H:i:s')
        );
    }
}
