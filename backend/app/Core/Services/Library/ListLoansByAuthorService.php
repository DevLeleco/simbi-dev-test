<?php

namespace App\Core\Services\Library;

use App\Core\Common\Ports\ViewModel;
use App\Core\Domain\Library\Exceptions\AuthorIdIsRequired;
use App\Core\Domain\Library\Ports\Persistence\LoanRepository;
use App\Core\Domain\Library\Ports\UseCases\ListLoansByAuthor\{
    ListLoansByAuthorOutputPort,
    ListLoansByAuthorRequestModel,
    ListLoansByAuthorResponseModel,
    ListLoansByAuthorUseCase,
};

final class ListLoansByAuthorService implements ListLoansByAuthorUseCase
{
    /**
     * @param ListLoansByAuthorOutputPort $output
     * @param LoanRepository $loanRepository
     */
    public function __construct(private ListLoansByAuthorOutputPort $output, private LoanRepository $loanRepository)
    {
    }

    /**
     * @param ListLoansByAuthorRequestModel $requestModel
     *
     * @return ViewModel
     */
    public function execute(ListLoansByAuthorRequestModel $requestModel): ViewModel
    {
        $this->validate($requestModel);

        $loans = $this->loanRepository->getLoansByAuthorId($requestModel->getAuthorId());

        return $this->output->present(new ListLoansByAuthorResponseModel($loans));
    }

    /**
     * @param ListLoansByAuthorRequestModel $requestModel
     *
     * @return void
     */
    private function validate(ListLoansByAuthorRequestModel $requestModel): void
    {
        if (empty($requestModel->getAuthorId())) {
            throw new AuthorIdIsRequired();
        }
    }
}
