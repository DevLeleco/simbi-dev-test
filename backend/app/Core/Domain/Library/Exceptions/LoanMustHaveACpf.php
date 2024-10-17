<?php

namespace App\Core\Domain\Library\Exceptions;

use DomainException;

final class LoanMustHaveACpf extends DomainException
{
    protected $message = 'Loan must have an cpf';
}
