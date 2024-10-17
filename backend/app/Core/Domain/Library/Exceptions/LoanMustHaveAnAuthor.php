<?php

namespace App\Core\Domain\Library\Exceptions;

use DomainException;

final class LoanMustHaveAnAuthor extends DomainException
{
    protected $message = 'Loan must have an author';
}
