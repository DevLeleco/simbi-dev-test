<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLoanRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "first_name" => ["string", "required"],
            "last_name" => ["string", "required"],
            "cpf" => ["string", "required"],
            "phone" => ["string", "required"],
            "address" => ["string", "required"],
            "exit_date" => ["date", "required"],
            "delivery_date" => ["date", "required"],
            "authorId" => ["uuid", "required"],
            "bookId" => ["uuid", "required"],
        ];
    }
}
