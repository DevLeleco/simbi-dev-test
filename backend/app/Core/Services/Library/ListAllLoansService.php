<?php

namespace App\Core\Services\Library;

use App\Core\Common\Ports\ViewModel;
use App\Core\Domain\Library\Ports\Persistence\LoanRepository;
use App\Core\Domain\Library\Ports\UseCases\ListAllLoans\{
    ListAllLoansOutputPort,
    ListAllLoansResponseModel,
    ListAllLoansUseCase,
};

final class ListAllLoansService implements ListAllLoansUseCase
{
    /**
     * @param ListAllLoansOutputPort $output
     * @param LoanRepository $bookRepository
     */
    public function __construct(private ListAllLoansOutputPort $output, private LoanRepository $bookRepository)
    {
    }

    public function execute(): ViewModel
    {
        $books = $this->bookRepository->getAll();
        return $this->output->present(new ListAllLoansResponseModel($books));
    }
}
