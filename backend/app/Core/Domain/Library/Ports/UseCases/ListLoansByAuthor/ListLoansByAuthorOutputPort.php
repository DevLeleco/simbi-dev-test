<?php

namespace App\Core\Domain\Library\Ports\UseCases\ListLoansByAuthor;

use App\Core\Common\Ports\ViewModel;

interface ListLoansByAuthorOutputPort
{
    /**
     * @param ListLoansByAuthorResponseModel $responseModel
     *
     * @return ViewModel
     */
    public function present(ListLoansByAuthorResponseModel $responseModel): ViewModel;
}
