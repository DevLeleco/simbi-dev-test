<?php

namespace App\Core\Services\Library;

use App\Core\Common\Ports\ViewModel;
use App\Core\Domain\Library\Exceptions\BookIdIsRequired;
use App\Core\Domain\Library\Ports\Persistence\LoanRepository;
use App\Core\Domain\Library\Ports\UseCases\ListLoansByBook\{
    ListLoansByBookOutputPort,
    ListLoansByBookRequestModel,
    ListLoansByBookResponseModel,
    ListLoansByBookUseCase,
};

final class ListLoansByBookService implements ListLoansByBookUseCase
{
    /**
     * @param ListLoansByBookOutputPort $output
     * @param LoanRepository $loanRepository
     */
    public function __construct(private ListLoansByBookOutputPort $output, private LoanRepository $loanRepository)
    {
    }

    /**
     * @param ListLoansByBookRequestModel $requestModel
     *
     * @return ViewModel
     */
    public function execute(ListLoansByBookRequestModel $requestModel): ViewModel
    {
        $this->validate($requestModel);

        $loans = $this->loanRepository->getLoansByBookId($requestModel->getBookId());

        return $this->output->present(new ListLoansByBookResponseModel($loans));
    }

    /**
     * @param ListLoansByBookRequestModel $requestModel
     *
     * @return void
     */
    private function validate(ListLoansByBookRequestModel $requestModel): void
    {
        if (empty($requestModel->getBookId())) {
            throw new BookIdIsRequired();
        }
    }
}
