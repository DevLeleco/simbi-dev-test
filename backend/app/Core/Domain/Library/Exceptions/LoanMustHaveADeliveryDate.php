<?php

namespace App\Core\Domain\Library\Exceptions;

use DomainException;

final class LoanMustHaveADeliveryDate extends DomainException
{
    protected $message = 'Loan must have an delivery date';
}
