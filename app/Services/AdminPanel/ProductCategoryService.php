<?php

namespace App\Services\AdminPanel;

use Yajra\DataTables\Facades\DataTables;

use App\Helpers\HashHelper;
use App\Helpers\MessageHelper;

use App\Models\ProductCategory;

class ProductCategoryService
{
    /**
     ** Datatable service.
     *
     * @param $request
     * @return object
     */
    public function datatable($request)
    {
        $productCategory = ProductCategory::orderBy('name', 'asc')
            ->get();

        $productCategory = Datatables::of($productCategory)
            ->addColumn('action', function ($row) {
                $edit =
                    <<<EOF
                        <a class="dropdown-item text-success" href="/kategori-produk/ubah-data/$row->hash_id">
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
                'action',
            ])
            ->make(true);

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
        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        ProductCategory::create($data);

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

        $productCategory = ProductCategory::firstWhere('id', $id);

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
     ** Update service.
     *
     * @param $request
     * @return object
     */
    public function update($request)
    {
        $id = HashHelper::decrypt($request->id);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        ProductCategory::where('id', $id)
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

        ProductCategory::where('id', $id)
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
