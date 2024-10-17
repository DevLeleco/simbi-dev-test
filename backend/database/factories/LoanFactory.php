<?php

namespace Database\Factories;
use App\Infra\Adapters\Persistence\Eloquent\Models\Author;
use App\Infra\Adapters\Persistence\Eloquent\Models\Book;
use App\Infra\Adapters\Persistence\Eloquent\Models\Loan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Infra\Adapters\Persistence\Eloquent\Models\Loan>
 */
class LoanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Loan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $author = Author::inRandomOrder()->first();
        $book = Book::inRandomOrder()->first();

        return [
            "id" => $this->faker->uuid(),
            "first_name" => $this->faker->firstName(),
            "last_name" => $this->faker->lastName(),
            "cpf" => '000.000.00.00',
            "phone" => $this->faker->phoneNumber(),
            "address" => $this->faker->address(),
            "exit_date" => $this->faker->dateTime(),
            "delivery_date" => $this->faker->dateTime(),
            "author_id" => $author->id,
            "book_id" => $book->id
        ];
    }
}
