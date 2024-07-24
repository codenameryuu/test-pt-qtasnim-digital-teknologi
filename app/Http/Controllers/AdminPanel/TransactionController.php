<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;

use App\Services\AdminPanel\TransactionService;

class TransactionController extends Controller
{
    /**
     ** Service instance.
     *
     * @var TransactionService
     */
    protected $transactionService;

    /**
     ** Constructor.
     *
     * @param TransactionService $transactionService
     */
    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    /**
     ** Index.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $result = $this->transactionService->index($request);

        return view('transaction.index', [
            'filter' => $result->filter,
        ]);
    }

    /**
     ** Datatable.
     *
     * @param Request $request
     * @return Response
     */
    public function datatable(Request $request)
    {
        $result = $this->transactionService->datatable($request);

        return $result->transaction;
    }

    /**
     ** Check stock.
     *
     * @param Request $request
     * @return Response
     */
    public function checkStock(Request $request)
    {
        $result = $this->transactionService->checkStock($request);

        return response()->json($result);
    }

    /**
     ** Create.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $result = $this->transactionService->create($request);

        return view('transaction.create', [
            'product' => $result->product,
        ]);
    }

    /**
     ** Store.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $result = $this->transactionService->store($request);

        return redirect()->back()->with($result->statusNotify, $result->message);
    }

    /**
     ** Edit.
     *
     * @param Request $request
     * @return Response
     */
    public function edit(Request $request)
    {
        $result = $this->transactionService->edit($request);

        return view('transaction.edit', [
            'transaction' => $result->transaction,
            'product' => $result->product,
        ]);
    }

    /**
     ** Update.
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $result = $this->transactionService->update($request);

        return redirect()->back()->with($result->statusNotify, $result->message);
    }

    /**
     ** Destroy.
     *
     * @param Request $request
     * @return Response
     */
    public function destroy(Request $request)
    {
        $result = $this->transactionService->destroy($request);

        return redirect()->back()->with($result->statusNotify, $result->message);
    }
}
