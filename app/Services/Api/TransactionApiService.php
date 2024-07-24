<?php

namespace App\Services\Api;

use App\Helpers\CheckHelper;
use App\Helpers\MessageHelper;

use App\Models\Transaction;

class TransactionApiService
{
    /**
     ** Index service.
     *
     * @param $request
     * @return object
     */
    public function index($request)
    {
        $status = true;
        $message = MessageHelper::retrieveSuccess();

        $filter = [];
        $sortKey = $request->sort_key;
        $sortOrder = strtoupper($request->sort_order);

        if (CheckHelper::isset($request->search)) {
            $filter['search'] = $request->search;
        }

        $transaction = Transaction::filter($filter)
            ->getPaginatedData(true, $request->page, $request->per_page, $sortKey, $sortOrder);

        $data = $transaction->data;
        $pagination = $transaction->pagination;

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'data' => $data,
            'pagination' => $pagination,
        ];

        return $result;
    }

    /**
     ** Show service.
     *
     * @param $request
     * @return object
     */
    public function show($request)
    {
        $status = true;
        $message = MessageHelper::retrieveSuccess();

        $data = Transaction::firstWhere('id', $request->transaction_id);

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];

        return $result;
    }

    /**
     ** Create service.
     *
     * @param $request
     * @return object
     */
    public function create($request)
    {
        $status = true;
        $message = MessageHelper::saveSuccess();

        $data = [
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ];

        $transaction = Transaction::create($data);

        $data = Transaction::firstWhere('id', $transaction->id);

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];

        return $result;
    }

    /**
     ** Update service.
     *
     * @param $request
     * @return object
     */
    public function update($request)
    {
        $status = true;
        $message = MessageHelper::saveSuccess();

        $data = [
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ];

        Transaction::where('id', $request->transaction_id)
            ->update($data);

        $data = Transaction::firstWhere('id', $request->transaction_id);

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];

        return $result;
    }

    /**
     ** Destroy service.
     *
     * @param $request
     * @return object
     */
    public function destroy($request)
    {
        $status = true;
        $message = MessageHelper::deleteSuccess();

        Transaction::where('id', $request->transaction_id)
            ->delete();

        $result = (object) [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }
}
