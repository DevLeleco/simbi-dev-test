<?php

namespace App\Http\Controllers;

use App\Core\Domain\Library\Ports\UseCases\CreateLoan\{CreateLoanRequestModel, CreateLoanUseCase};
use App\Http\Requests\CreateLoanRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CreateLoanController extends Controller
{
    /**
     * @param CreateLoanUseCase $useCase
     */
    public function __construct(private CreateLoanUseCase $useCase)
    {
    }

    /**
     * Permite adicionar um novo emprestimo
     *
     * @OA\Post(
     *    path="/api/loans/create",
     *    summary="Adiciona um novo emprestimo na API",
     *    tags={"Loans"},
     *
     *    @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(
     *        type="object",
     *        required={"firstName","lastName"},
     *        @OA\Property(property="first_name", type="string"),
     *        @OA\Property(property="last_name", type="string"),
     *        @OA\Property(property="cpf", type="string"),
     *        @OA\Property(property="phone", type="string"),
     *        @OA\Property(property="address", type="string"),
     *        @OA\Property(property="exit_date", type="date"),
     *        @OA\Property(property="last_date", type="date"),
     *        @OA\Property(property="authorId", type="string"),
     *        @OA\Property(property="bookId", type="string"),
     *      )
     *    ),
     *
     *    @OA\Response(
     *      response=201,
     *      description="Loan Created",
     *      @OA\JsonContent(
     *          type="object",
     *         @OA\Property(
     *          property="id",
     *          type="string",
     *          example="13b35be6-65a7-4d7f-9ad2-8caaf3c75344",
     *         ),
     *         @OA\Property(
     *          property="first_name",
     *          type="string",
     *          example="Primeiro nome",
     *         ),
     *         @OA\Property(
     *          property="last_name",
     *          type="string",
     *          example="Ultimo nome",
     *         ),
     *         @OA\Property(
     *          property="cpf",
     *          type="string",
     *          example="000.000.000-00",
     *         ),
     *         @OA\Property(
     *          property="phone",
     *          type="string",
     *          example="(00)0000-0000",
     *         ),
     *         @OA\Property(
     *          property="address",
     *          type="string",
     *          example="Endereço do cliente à realizar o emprestimo",
     *         ),
     *         @OA\Property(
     *          property="lastName",
     *          type="string",
     *          example="Ultimo nome",
     *         ),
     *         @OA\Property(
     *          property="exitDate",
     *          type="string",
     *          example="2022-12-14T22:24:26+00:00",
     *         ),
     *         @OA\Property(
     *          property="deliveryDate",
     *          type="string",
     *          example="2022-12-14T22:24:26+00:00",
     *         ),
     *         @OA\Property(
     *          property="author",
     *          type="object",
     *          @OA\Property(property="id", type="string", example="13b35be6-65a7-4d7f-9ad2-8caaf3c75344"),
     *          @OA\Property(property="name", type="string", example="Autor Y"),
     *         ),
     *         @OA\Property(
     *          property="book",
     *          type="object",
     *          @OA\Property(property="id", type="string", example="13b35be6-65a7-4d7f-9ad2-8caaf3c75344"),
     *          @OA\Property(property="name", type="string", example="Book Z"),
     *         ),
     *         @OA\Property(
     *          property="createdAt",
     *          type="string",
     *          example="2022-12-14T22:24:26+00:00",
     *         ),
     *         @OA\Property(
     *          property="updatedAt",
     *          type="string",
     *          example="2022-12-14T22:24:26+00:00",
     *         ),
     *      )
     *    ),
     *
     *    @OA\Response(response="400", description="Requisição com erro",
     *      @OA\MediaType(
     *       mediaType="application/json",
     *          @OA\Schema(ref="#/components/schemas/Bad Request")
     *      )
     *    ),
     *    @OA\Response(response="401", description="Proibido",
     *      @OA\MediaType(
     *       mediaType="application/json",
     *          @OA\Schema(ref="#/components/schemas/Forbidden Error")
     *      )
     *    ),
     *    @OA\Response(response="403", description="Não autorizado",
     *      @OA\MediaType(
     *       mediaType="application/json",
     *          @OA\Schema(ref="#/components/schemas/Unauthorized Error")
     *      )
     *    ),
     *    @OA\Response(response="500", description="Erro interno",
     *      @OA\MediaType(
     *       mediaType="application/json",
     *          @OA\Schema(ref="#/components/schemas/Internal server error")
     *      )
     *    ),
     *
     * ),
     *
     * @param  CreateLoanRequest $request
     *
     * @return JsonResponse
     */
    public function __invoke(CreateLoanRequest $request)
    {
        $viewModel = $this->useCase->execute(new CreateLoanRequestModel($request->validated()));
        return response()->json($viewModel->getResponse(), Response::HTTP_CREATED);
    }
}
