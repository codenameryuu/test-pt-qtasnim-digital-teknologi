<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Validations\Api\TransactionApiValidation;
use App\Services\Api\TransactionApiService;

class TransactionApiController extends Controller
{
    /**
     ** Validation instance.
     *
     * @var TransactionApiValidation
     */
    protected $transactionApiValidation;

    /**
     ** Service instance.
     *
     * @var TransactionApiService
     */
    protected $transactionApiService;

    /**
     ** Constructor.
     *
     * @param TransactionApiValidation $transactionApiValidation
     * @param TransactionApiService $transactionApiService
     * @return void
     */
    public function __construct(TransactionApiValidation $transactionApiValidation, TransactionApiService $transactionApiService)
    {
        $this->transactionApiValidation = $transactionApiValidation;
        $this->transactionApiService = $transactionApiService;
    }

    /**
     ** Index.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $validation = $this->transactionApiValidation->index($request);

        if (!$validation->status) {
            return $this->formatResponse($validation);
        }

        $result = $this->transactionApiService->index($request);

        return $this->formatResponse($result);
    }

    /**
     ** Show.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function show(Request $request)
    {
        $request['transaction_id'] = $request->transaction_id;
        $validation = $this->transactionApiValidation->show($request);

        if (!$validation->status) {
            return $this->formatResponse($validation);
        }

        $result = $this->transactionApiService->show($request);

        return $this->formatResponse($result);
    }

    /**
     ** Create.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $validation = $this->transactionApiValidation->create($request);

        if (!$validation->status) {
            return $this->formatResponse($validation);
        }

        $result = $this->transactionApiService->create($request);

        return $this->formatResponse($result);
    }

    /**
     ** Update.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request)
    {
        $request['transaction_id'] = $request->transaction_id;
        $validation = $this->transactionApiValidation->update($request);

        if (!$validation->status) {
            return $this->formatResponse($validation);
        }

        $result = $this->transactionApiService->update($request);

        return $this->formatResponse($result);
    }

    /**
     ** Destroy.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request)
    {
        $request['transaction_id'] = $request->transaction_id;
        $validation = $this->transactionApiValidation->destroy($request);

        if (!$validation->status) {
            return $this->formatResponse($validation);
        }

        $result = $this->transactionApiService->destroy($request);

        return $this->formatResponse($result);
    }
}
