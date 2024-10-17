<?php

namespace App\Core\Domain\Library\Exceptions;

use DomainException;

final class LoanMustHaveALastName extends DomainException
{
    protected $message = 'Loan must have an last name';
}
