<?php

namespace App\Core\Domain\Library\Exceptions;

use DomainException;

final class LoanMustHaveAAddress extends DomainException
{
    protected $message = 'Loan must have an address';
}
