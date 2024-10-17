<?php

namespace App\Core\Domain\Library\Ports\UseCases\ListLoansByAuthor;

use App\Core\Common\Ports\ViewModel;

interface ListLoansByAuthorUseCase
{
    public function execute(ListLoansByAuthorRequestModel $requestModel): ViewModel;
}
