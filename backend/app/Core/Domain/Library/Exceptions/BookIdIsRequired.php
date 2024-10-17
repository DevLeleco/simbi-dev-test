<?php

namespace App\Core\Domain\Library\Exceptions;

use InvalidArgumentException;

final class BookIdIsRequired extends InvalidArgumentException
{
    protected $message = 'Book Id is required';
}
