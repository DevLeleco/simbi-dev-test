<?php

namespace App\Http\Resources\Library;

use App\Core\Domain\Library\Entities\Loan;
use DateTime;
use Illuminate\Http\Resources\Json\JsonResource;

final class CreateLoanResource extends JsonResource
{
    /**
     * @param Loan $loan
     */
    public function __construct(private Loan $loan)
    {
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request = null)
    {
        return [
            'id' => $this->loan->id,
            'first_name' => $this->loan->first_name,
            'last_name' => $this->loan->last_name,
            'cpf' => $this->loan->cpf,
            'phone' => $this->loan->phone,
            'address' => $this->loan->address,
            'exit_date' => $this->loan->exit_date,
            'delivery_date' => $this->loan->delivery_date,
            'author' => (new AuthorDetailsResource($this->loan->author))->resolve(),
            'book' => (new BookDetailsResource($this->loan->book))->resolve(),
            'createdAt' => $this->loan->createdAt->format(DateTime::ATOM),
            'updatedAt' => $this->loan->updatedAt->format(DateTime::ATOM),
        ];
    }
}
