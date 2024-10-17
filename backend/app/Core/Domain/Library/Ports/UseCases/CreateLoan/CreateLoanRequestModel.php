<?php

namespace App\Core\Domain\Library\Ports\UseCases\CreateLoan;

final class CreateLoanRequestModel
{
    /**
     * @param array $attributes
     */
    public function __construct(private array $attributes = [])
    {
    }

    /**
     * @return string|null
     */
    public function getFirstName(): string|null
    {
        return $this->attributes['first_name'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getLastName(): string|null
    {
        return $this->attributes['last_name'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getCpf(): string|null
    {
        return $this->attributes['cpf'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getPhone(): string|null
    {
        return $this->attributes['phone'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getAddress(): string|null
    {
        return $this->attributes['address'] ?? null;
    }

    /**
     * @return \DateTime|null
     */
    public function getExitDate(): string|null
    {
        return $this->attributes['exit_date'] ?? null;
    }

    /**
     * @return \DateTime|null
     */
    public function getDeliveryDate(): string|null
    {
        return $this->attributes['delivery_date'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getAuthorId(): string|null
    {
        return $this->attributes['authorId'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getBookId(): string|null
    {
        return $this->attributes['bookId'] ?? null;
    }
}
