<?php

namespace App\Core\Domain\Library\Exceptions;

use DomainException;

final class LoanMustHaveAPhone extends DomainException
{
    protected $message = 'Loan must have an phone';
}
