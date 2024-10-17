<?php

namespace App\Core\Domain\Library\Entities;

use App\Core\Common\Entities\Entity;
use App\Core\Common\Traits\{WithCreatedAt, WithUpdatedAt, WithDeletedAt};
use App\Core\Domain\Library\Exceptions\{
    LoanMustHaveAFirstName, 
    LoanMustHaveALastName, 
    LoanMustHaveACpf,
    LoanMustHaveAPhone,
    LoanMustHaveAAddress,
    LoanMustHaveAExitDate,
    LoanMustHaveADeliveryDate,
    LoanMustHaveAnAuthor,
    LoanMustHaveAnBook
};
use DateTime;

final class Loan extends Entity
{
    use WithCreatedAt, WithUpdatedAt, WithDeletedAt;

    /**
     * @var ?string $id
     */
    public ?string $id;
    /**
     * @var ?string $first_name
     */
    public ?string $first_name;
    /**
     * @var ?string $last_name
     */
    public ?string $last_name;
    /**
     * @var ?string $cpf
     */
    public ?string $cpf;
    /**
     * @var ?string $phone
     */
    public ?string $phone;
    /**
     * @var ?string $address;
     */
    public ?string $address;
    /**
     * @var ?DateTime $exit_date;
     */
    public ?DateTime $exit_date;
    /**
     * @var ?DateTime $delivery_date;
     */
    public ?DateTime $delivery_date;
    /**
     * @var ?string $author_id
     */
    public ?string $author_id;
    /**
     * @var ?Author $author
     */
    public ?Author $author;
    /**
     * @var ?string $book_id
     */
    public ?string $book_id;
    /**
     * @var ?Book $book
     */
    public ?Book $book;
    

    /**
     * @param ?string $id
     * @param ?string $first_name
     * @param ?string $last_name
     * @param ?string $cpf
     * @param ?string $phone
     * @param ?string $address
     * @param DateTime $exit_date
     * @param DateTime $delivery_date
     * @param ?string $author_id
     * @param ?string $book_id
     * @param DateTime $createdAt
     * @param DateTime $updatedAt
     */
    public function __construct(
        ?string $id = null,
        ?string $first_name = null,
        ?string $last_name = null,
        ?string $cpf = null,
        ?string $phone = null,
        ?string $address = null,
        ?DateTime $exit_date = null,
        ?DateTime $delivery_date = null,
        ?string $author_id = null,
        ?string $book_id = null,
        ?DateTime $createdAt = null,
        ?DateTime $updatedAt = null,
        
    ) {
        parent::__construct($id);
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->cpf = $cpf;
        $this->phone = $phone;
        $this->address = $address;
        $this->exit_date = $exit_date;
        $this->delivery_date = $delivery_date;
        $this->author_id = $author_id;
        $this->book_id = $book_id;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }
    /**
     * @param Author $author
     *
     * @return void
     */
    public function addAuthor(Author $author): void
    {
        $this->author = $author;
    }
    /**
     * @param Book $book
     *
     * @return void
     */
    public function addBook(Book $book): void
    {
        $this->book = $book;
    }

    /**
     * @return void
     */
    public function validate(): void
    {
        
        if (empty($this->first_name)) {
            throw new LoanMustHaveAFirstName();
        }

        if (empty($this->last_name)) {
            throw new LoanMustHaveALastName();
        }

        if (empty($this->cpf)) {
            throw new LoanMustHaveACpf();
        }

        if (empty($this->phone)) {
            throw new LoanMustHaveAPhone();
        }

        if (empty($this->address)) {
            throw new LoanMustHaveAAddress();
        }

        if (empty($this->exit_date)) {
            throw new LoanMustHaveAExitDate();
        }

        if (empty($this->delivery_date)) {
            throw new LoanMustHaveADeliveryDate();
        }

        if (empty($this->author_id)) {
            throw new LoanMustHaveAnAuthor();
        }

        if (empty($this->book_id)) {
            throw new LoanMustHaveAnBook();
        }
    }
}
