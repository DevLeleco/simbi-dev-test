<?php

namespace App\Core\Domain\Library\Ports\UseCases\ListLoansByAuthor;

use App\Core\Domain\Library\Entities\Loan;

final class ListLoansByAuthorResponseModel
{
    /**
     * @param array<Loan> $loans
     */
    public function __construct(private array $loans)
    {
    }

    /**
     * @return array<Loan>
     */
    public function getLoans(): array
    {
        return $this->loans;
    }
}
