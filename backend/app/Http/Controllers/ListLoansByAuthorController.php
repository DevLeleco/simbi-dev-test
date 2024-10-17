<?php

namespace App\Http\Controllers;

use App\Core\Domain\Library\Ports\UseCases\ListLoansByAuthor\{ListLoansByAuthorRequestModel, ListLoansByAuthorUseCase};
use App\Http\Requests\ListLoansByAuthorRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ListLoansByAuthorController extends Controller
{
    /**
     * @param ListLoansByAuthorUseCase $useCase
     */
    public function __construct(private ListLoansByAuthorUseCase $useCase)
    {
    }
    /**
     * Lista todos os emprestimos cadastrados de um determinado autor.
     *
     * @OA\Get(
     *    path="/api/loans/{id}/authors",
     *    summary="Lista todos os emprestimos cadastrados na API para um determinado autor",
     *    tags={"Loans"},
     *
     *    @OA\Parameter(
     *      name="id",
     *      in="path",
     *      schema={"type": "string", "default": "2234f840-417e-4944-ac9b-e7e6eb06c590"},
     *      description="ID do autor",
     *      required=true,
     *    ),
     *
     *    @OA\Response(
     *      response=200,
     *      description="Loans list",
     *      @OA\JsonContent(
     *        type="array",
     *        @OA\Items(
     *          @OA\Property(
     *           property="id",
     *           type="string",
     *           example="13b35be6-65a7-4d7f-9ad2-8caaf3c75344",
     *          ),
     *          @OA\Property(
     *           property="first_name",
     *           type="string",
     *           example="Primeiro nome",
     *          ),
     *          @OA\Property(
     *           property="last_name",
     *           type="string",
     *           example="Ultimo nome",
     *          ),
     *          @OA\Property(
     *           property="cpf",
     *           type="string",
     *           example="000.000.000-00",
     *          ),
     *          @OA\Property(
     *           property="phone",
     *           type="string",
     *           example="(00)0000-0000",
     *          ),
     *          @OA\Property(
     *           property="address",
     *           type="string",
     *           example="Endereço do cliente à realizar o emprestimo",
     *          ),
     *          @OA\Property(
     *           property="lastName",
     *           type="string",
     *           example="Ultimo nome",
     *          ),
     *          @OA\Property(
     *           property="exitDate",
     *           type="string",
     *           example="2022-12-14T22:24:26+00:00",
     *          ),
     *          @OA\Property(
     *           property="deliveryDate",
     *           type="string",
     *           example="2022-12-14T22:24:26+00:00",
     *          ),
     *          @OA\Property(
     *           property="author",
     *           type="object",
     *           @OA\Property(property="id", type="string", example="13b35be6-65a7-4d7f-9ad2-8caaf3c75344"),
     *           @OA\Property(property="name", type="string", example="Autor Y"),
     *          ),
     *          @OA\Property(
     *           property="book",
     *           type="object",
     *           @OA\Property(property="id", type="string", example="13b35be6-65a7-4d7f-9ad2-8caaf3c75344"),
     *           @OA\Property(property="name", type="string", example="Book Z"),
     *          ),
     *          @OA\Property(
     *           property="createdAt",
     *           type="string",
     *           example="2022-12-14T22:24:26+00:00",
     *          ),
     *          @OA\Property(
     *           property="updatedAt",
     *           type="string",
     *           example="2022-12-14T22:24:26+00:00",
     *          ),
     *        )
     *      ),
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
     * @param  ListLoansByAuthorRequest  $request
     *
     * @return JsonResponse
     */
    public function __invoke(ListLoansByAuthorRequest $request)
    {
        $viewModel = $this->useCase->execute(new ListLoansByAuthorRequestModel($request->validated()));
        return response()->json($viewModel->getResponse(), Response::HTTP_OK);
    }
}
