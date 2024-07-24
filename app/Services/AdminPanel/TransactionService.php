<?php

namespace App\Services\AdminPanel;

use Yajra\DataTables\Facades\DataTables;

use App\Helpers\CheckHelper;
use App\Helpers\FormatterHelper;
use App\Helpers\HashHelper;
use App\Helpers\MessageHelper;

use App\Models\Product;
use App\Models\Transaction;

class TransactionService
{
    /**
     ** Index service.
     *
     * @param $request
     * @return object
     */
    public function index($request)
    {
        $filter = [
            'startDate' => null,
            'endDate' => null,
        ];

        if (CheckHelper::isset($request->filter)) {
            if (CheckHelper::issetArray($request->filter, 'startDate')) {
                $filter['startDate'] = $request->filter['startDate'];
            }

            if (CheckHelper::issetArray($request->filter, 'endDate')) {
                $filter['endDate'] = $request->filter['endDate'];
            }
        }

        $filter = (object) $filter;

        $status = true;
        $message = MessageHelper::retrieveSuccess();

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'filter' => $filter,
        ];

        return $result;
    }

    /**
     ** Datatable service.
     *
     * @param $request
     * @return object
     */
    public function datatable($request)
    {
        $transaction = Transaction::when($request->filterStartDate, function ($query) use ($request) {
            $query->whereDate('created_at', '>=', $request->filterStartDate);
        })
            ->when($request->filterEndDate, function ($query) use ($request) {
                $query->whereDate('created_at', '<=', $request->filterEndDate);
            })
            ->orderBy('created_at', 'asc')
            ->get();

        $transaction = Datatables::of($transaction)
            ->addColumn('productNameCustom', function ($row) {
                return $row->product->name;
            })
            ->addColumn('productCategoryNameCustom', function ($row) {
                return $row->product->productCategory->name;
            })
            ->addColumn('stockCustom', function ($row) {
                $transaction = Transaction::where('product_id', $row->product_id)
                    ->where('id', '<', $row->id)
                    ->sum('quantity');

                $result = $row->product->stock - $transaction;

                return $result;
            })
            ->addColumn('quantityCustom', function ($row) {
                return FormatterHelper::formatNumber($row->quantity);
            })
            ->addColumn('transactionDateCustom', function ($row) {
                return FormatterHelper::formatDate($row->created_at);
            })
            ->addColumn('action', function ($row) {
                $edit =
                    <<<EOF
                        <a class="dropdown-item text-success" href="/transaksi/ubah-data/$row->hash_id">
                            <i class="ti ti-edit me-2"></i>
                            Ubah
                        </a>
                    EOF;

                $delete =
                    <<<EOF
                        <a class="dropdown-item text-danger" href="javascript:void(0)" onclick="confirmDelete('$row->hash_id')">
                            <i class="ti ti-trash me-2"></i>
                            Hapus
                        </a>
                    EOF;

                $result =
                    <<<EOF
                        <div class="btn-group">
                            <a href="javascript:void(0);" class="text-black dropdown-toggle hide-arrow"
                                data-bs-toggle="dropdown">
                                <i class="ti ti-dots-vertical"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                $edit

                                $delete
                            </div>
                        </div>
                    EOF;

                return $result;
            })
            ->rawColumns([
                'productNameCustom',
                'stockCustom',
                'quantityCustom',
                'transactionDateCustom',
                'action',
            ])
            ->make(true);

        $status = true;
        $message = MessageHelper::retrieveSuccess();

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'transaction' => $transaction,
        ];

        return $result;
    }

    /**
     ** Check stock service.
     *
     * @param $request
     * @return object
     */
    public function checkStock($request)
    {
        $productId = HashHelper::decrypt($request->productId);

        $product = Product::firstWhere('id', $productId);

        $transaction = Transaction::where('product_id', $productId)
            ->sum('quantity');

        $quantity = FormatterHelper::convertToInteger($request->quantity);
        $total = $transaction + $quantity;

        if ($total < $product->stock) {
            $status = true;
            $message = "Stok produk tersedia !";
        } else {
            $status = false;
            $message = "Stok produk tidak tersedia !";
        }

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'total' => $total,
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
        $product = Product::orderBy('name', 'asc')
            ->get();

        $status = true;
        $message = MessageHelper::retrieveSuccess();

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'product' => $product,
        ];

        return $result;
    }

    /**
     ** Store service.
     *
     * @param $request
     * @return object
     */
    public function store($request)
    {
        $productId = HashHelper::decrypt($request->productId);

        $data = [
            'product_id' => $productId,
            'quantity' => FormatterHelper::convertToInteger($request->quantity),
        ];

        Transaction::create($data);

        $status = true;
        $statusNotify = 'success';
        $message = MessageHelper::saveSuccess();

        $result = (object) [
            'status' => $status,
            'statusNotify' => $statusNotify,
            'message' => $message,
        ];

        return $result;
    }

    /**
     ** Edit service.
     *
     * @param $request
     * @return object
     */
    public function edit($request)
    {
        $id = HashHelper::decrypt($request->id);

        $transaction = Transaction::firstWhere('id', $id);

        $product = Product::orderBy('name', 'asc')
            ->get();

        $status = true;
        $message = MessageHelper::retrieveSuccess();

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'transaction' => $transaction,
            'product' => $product,
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
        $id = HashHelper::decrypt($request->id);
        $productId = HashHelper::decrypt($request->productId);

        $data = [
            'product_id' => $productId,
            'quantity' => FormatterHelper::convertToInteger($request->quantity),
        ];

        Transaction::where('id', $id)
            ->update($data);

        $status = true;
        $statusNotify = 'success';
        $message = MessageHelper::saveSuccess();

        $result = (object) [
            'status' => $status,
            'statusNotify' => $statusNotify,
            'message' => $message,
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
        $id = HashHelper::decrypt($request->id);

        Transaction::where('id', $id)
            ->delete();

        $status = true;
        $statusNotify = 'success';
        $message = MessageHelper::deleteSuccess();

        $result = (object) [
            'status' => $status,
            'statusNotify' => $statusNotify,
            'message' => $message,
        ];

        return $result;
    }
}
