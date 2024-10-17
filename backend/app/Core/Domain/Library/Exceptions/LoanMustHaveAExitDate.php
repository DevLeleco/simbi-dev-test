<?php

namespace App\Core\Domain\Library\Exceptions;

use DomainException;

final class LoanMustHaveAExitDate extends DomainException
{
    protected $message = 'Loan must have an exit date';
}
