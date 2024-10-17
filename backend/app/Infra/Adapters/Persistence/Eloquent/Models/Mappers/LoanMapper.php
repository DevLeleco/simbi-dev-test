<?php

namespace App\Infra\Adapters\Persistence\Eloquent\Models\Mappers;

use App\Core\Domain\Library\Entities\Loan as DomainLoan;
use App\Infra\Adapters\Persistence\Eloquent\Models\Loan as EloquentLoan;
use Carbon\Carbon;

final class LoanMapper
{
    /**
     * @param DomainLoan $loan
     *
     * @return EloquentLoan
     */
    public static function toEloquentModel(DomainLoan $loan): EloquentLoan
    {
        return new EloquentLoan([
            'id' => $loan->id,
            'first_name' => $loan->first_name,
            'last_name' => $loan->last_name,
            'cpf' => $loan->cpf,
            'phone' => $loan->phone,
            'address' => $loan->address,
            'exit_date' => $loan->exit_date,
            'delivery_date' => $loan->delivery_date,
            'author_id' => $loan->author_id,
            'book_id' => $loan->book_id,
        ]);
    }

    /**
     * @param EloquentLoan $loan
     * @param bool $withRelations
     *
     * @return DomainLoan
     */
    public static function toDomainEntity(EloquentLoan $loan, bool $withRelations = true): DomainLoan
    {
    $domainLoan = new DomainLoan(
            id: $loan->id,
            first_name: $loan->first_name,
            last_name: $loan->last_name,
            cpf: $loan->cpf,
            phone: $loan->phone,
            address: $loan->address,
            exit_date: Carbon::parse($loan->exit_date),
            delivery_date: Carbon::parse($loan->delivery_date),
            author_id: $loan->author_id,
            book_id: $loan->book_id,
            createdAt: $loan->created_at,
            updatedAt: $loan->updated_at,
        );

        if ($withRelations && ! empty($loan->author)) {
            $domainLoan->addAuthor(AuthorMapper::toDomainEntity($loan->author));
        }

        if ($withRelations && ! empty($loan->book)) {
            $domainLoan->addBook(BookMapper::toDomainEntity($loan->book));
        }

        return $domainLoan;
    }

    /**
     * @param array<EloquentLoan> $Loan
     *
     * @return array<DomainLoan>
     */
    public static function toManyDomainEntities(array $loans): array
    {
        return array_map(static fn ($loan) => self::toDomainEntity($loan), $loans);
    }
}
