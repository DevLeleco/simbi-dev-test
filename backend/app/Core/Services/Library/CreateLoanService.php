<?php

namespace App\Core\Services\Library;

use Carbon\Carbon;
use App\Core\Common\Ports\ViewModel;
use App\Core\Domain\Library\Entities\Loan;
use App\Core\Domain\Library\Exceptions\{
    LoanMustHaveAnBook, 
    LoanMustHaveAAddress, 
    LoanMustHaveACpf,
    LoanMustHaveADeliveryDate,
    LoanMustHaveAExitDate,
    LoanMustHaveAFirstName,
    LoanMustHaveALastName,
    LoanMustHaveAnAuthor,
    LoanMustHaveAPhone,
};
use App\Core\Domain\Library\Ports\Persistence\LoanRepository;
use App\Core\Domain\Library\Ports\UseCases\CreateLoan\{
    CreateLoanOutputPort,
    CreateLoanRequestModel,
    CreateLoanResponseModel,
    CreateLoanUseCase,
};

final class CreateLoanService implements CreateLoanUseCase
{
    /**
     * @param CreateLoanOutputPort $output
     */
    public function __construct(private CreateLoanOutputPort $output, private LoanRepository $loanRepository)
    {
    }

    /**
     * @param CreateLoanRequestModel $requestModel
     *
     * @return ViewModel
     */
    public function execute(CreateLoanRequestModel $requestModel): ViewModel
    {
        $this->validate($requestModel);

        $loan = $this->loanRepository->create(
            new Loan(
                first_name: $requestModel->getFirstName(),
                last_name: $requestModel->getLastName(),
                cpf: $requestModel->getCpf(),
                phone: $requestModel->getPhone(),
                address: $requestModel->getAddress(),
                exit_date: Carbon::parse($requestModel->getExitDate()),
                delivery_date: Carbon::parse($requestModel->getDeliveryDate()),
                author_id: $requestModel->getAuthorId(),
                book_id: $requestModel->getBookId(),
            ),
        );

        return $this->output->present(new CreateLoanResponseModel($loan));
    }

    /**
     * @param CreateLoanRequestModel $requestModel
     *
     * @return void
     */
    private function validate(CreateLoanRequestModel $requestModel): void
    {
        if (empty($requestModel->getFirstName())) {
            throw new LoanMustHaveAFirstName();
        }

        if (empty($requestModel->getLastName())) {
            throw new LoanMustHaveALastName();
        }

        if (empty($requestModel->getCpf())) {
           throw new LoanMustHaveACpf();
        }

        if (empty($requestModel->getPhone())) {
            throw new LoanMustHaveAPhone();
        }

        if (empty($requestModel->getAddress())) {
            throw new LoanMustHaveAAddress();
        }

        if (empty($requestModel->getExitDate())) {
            throw new LoanMustHaveAExitDate();
        }

        if (empty($requestModel->getDeliveryDate())) {
           throw new LoanMustHaveADeliveryDate();
        }

        if (empty($requestModel->getAuthorId())) {
            throw new LoanMustHaveAnAuthor();
        }

        if (empty($requestModel->getBookId())) {
            throw new LoanMustHaveAnBook();
        }
    }
}
