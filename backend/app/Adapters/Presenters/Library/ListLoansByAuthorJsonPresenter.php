<?php

namespace App\Adapters\Presenters\Library;

use App\Adapters\ViewModel\JsonResourceViewModel;
use App\Core\Common\Ports\ViewModel;
use App\Core\Domain\Library\Ports\UseCases\ListLoansByAuthor\{
    ListLoansByAuthorOutputPort,
    ListLoansByAuthorResponseModel,
};
use App\Http\Resources\Library\ListLoansByAuthorResource;

final class ListLoansByAuthorJsonPresenter implements ListLoansByAuthorOutputPort
{
    /**
     * @param ListLoansByAuthorResponseModel $responseModel
     *
     * @return ViewModel
     */
    public function present(ListLoansByAuthorResponseModel $responseModel): ViewModel
    {
        return new JsonResourceViewModel(ListLoansByAuthorResource::collection($responseModel->getLoans()));
    }
}
