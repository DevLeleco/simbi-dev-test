<?php

namespace App\Core\Domain\Library\Ports\Persistence;

use App\Core\Domain\Library\Entities\Loan;

interface LoanRepository
{
    /**
     * @param Loan $loan
     *
     * @return Loan
     */
    public function create(Loan $loan): Loan;

    /**
     * @return array<Loan>;
     */
    public function getAll(): array;

    /**
     * @param string $author_id
     *
     * @return array<Loan>;
     */
    public function getLoansByAuthorId(string $author_id): array;

    /**
     * @param string $book_id
     *
     * @return array<Loan>;
     */
    public function getLoansByBookId(string $book_id): array;
}
