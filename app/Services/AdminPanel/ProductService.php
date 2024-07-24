<?php

namespace App\Services\AdminPanel;

use Yajra\DataTables\Facades\DataTables;

use App\Helpers\FormatterHelper;
use App\Helpers\HashHelper;
use App\Helpers\MessageHelper;

use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Transaction;

class ProductService
{
    /**
     ** Datatable service.
     *
     * @param $request
     * @return object
     */
    public function datatable($request)
    {
        $product = Product::orderBy('name', 'asc')
            ->get();

        $product = Datatables::of($product)
            ->addColumn('productCategoryNameCustom', function ($row) {
                return $row->productCategory->name;
            })
            ->addColumn('stockCustom', function ($row) {
                return FormatterHelper::formatNumber($row->stock);
            })
            ->addColumn('highestQuantityTransaction', function ($row) {
                return FormatterHelper::formatNumber($row->highest_quantity_transaction);
            })
            ->addColumn('lowestQuantityTransaction', function ($row) {
                return FormatterHelper::formatNumber($row->lowest_quantity_transaction);
            })
            ->addColumn('action', function ($row) {
                $edit =
                    <<<EOF
                        <a class="dropdown-item text-success" href="/produk/ubah-data/$row->hash_id">
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
                'productCategoryName',
                'highestQuantityTransaction',
                'lowestQuantityTransaction',
                'action',
            ])
            ->make(true);

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
     ** Create service.
     *
     * @param $request
     * @return object
     */
    public function create($request)
    {
        $productCategory = ProductCategory::orderBy('name', 'asc')
            ->get();

        $status = true;
        $message = MessageHelper::retrieveSuccess();

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'productCategory' => $productCategory,
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
        $productCategoryId = HashHelper::decrypt($request->productCategoryId);

        $data = [
            'product_category_id' => $productCategoryId,
            'name' => $request->name,
            'stock' => $request->stock,
        ];

        Product::create($data);

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

        $product = Product::firstWhere('id', $id);

        $productCategory = ProductCategory::orderBy('name', 'asc')
            ->get();

        $status = true;
        $message = MessageHelper::retrieveSuccess();

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'product' => $product,
            'productCategory' => $productCategory,
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
        $productCategoryId = HashHelper::decrypt($request->productCategoryId);

        $data = [
            'product_category_id' => $productCategoryId,
            'name' => $request->name,
            'stock' => $request->stock,
        ];

        Product::where('id', $id)
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

        Product::where('id', $id)
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
