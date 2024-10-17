<?php

namespace App\Core\Domain\Library\Exceptions;

use DomainException;

final class LoanMustHaveAFirstName extends DomainException
{
    protected $message = 'Loan must have an first name';
}
