<?php

namespace App\Infra\Adapters\Persistence\Eloquent\Repositories;

use App\Core\Domain\Library\Entities\Loan;
use App\Core\Domain\Library\Ports\Persistence\LoanRepository;
use App\Infra\Adapters\Persistence\Eloquent\Models\Loan as EloquentLoan;
use App\Infra\Adapters\Persistence\Eloquent\Models\Mappers\LoanMapper;

final class LoanEloquentRepository implements LoanRepository
{
    /**
     * @param Loan $loan
     *
     * @return Loan
     */
    public function create(Loan $loan): Loan
    {
        $eloquentLoan = LoanMapper::toEloquentModel($loan);
        $eloquentLoan->save();

        return LoanMapper::toDomainEntity($eloquentLoan);
    }

    /**
     * @return array<Loan>
     */
    public function getAll(): array
    {
        $loans = EloquentLoan::with(['author'])
            ->get()
            ->all();

        if (empty($loans)) {
            return [];
        }

        return LoanMapper::toManyDomainEntities($loans);
    }

    /**
     * @param string $author_id
     *
     * @return array<Loan>
     */
    public function getLoansByAuthorId(string $author_id): array
    {
        $eloquentLoans = EloquentLoan::where(['author_id' => $author_id])
            ->with(['author'])
            ->get()
            ->all();

        if (empty($eloquentLoans)) {
            return [];
        }

        return LoanMapper::toManyDomainEntities($eloquentLoans);
    }

    /**
     * @param string $book_id
     *
     * @return array<Loan>
     */
    public function getLoansByBookId(string $book_id): array
    {
        $eloquentLoans = EloquentLoan::where(['book_id' => $book_id])
            ->with(['book'])
            ->get()
            ->all();

        if (empty($eloquentLoans)) {
            return [];
        }

        return LoanMapper::toManyDomainEntities($eloquentLoans);
    }
}
