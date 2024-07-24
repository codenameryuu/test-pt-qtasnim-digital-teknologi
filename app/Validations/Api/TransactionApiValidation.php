<?php

namespace App\Validations\Api;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Helpers\MessageHelper;

class TransactionApiValidation
{
    /**
     ** Index validation.
     *
     * @param $request
     * @return object
     */
    public function index($request)
    {
        $status = true;
        $message = MessageHelper::validateSuccess();

        $schema = [
            'page' => [
                'required',
                'numeric',
                'min:1',
            ],

            'per_page' => [
                'required',
                'numeric',
                'min:1',
            ],

            'sort_key' => [
                'required',
                Rule::in([
                    'quantity',
                    'created_at'
                ]),
            ],

            'sort_order' => [
                'required',
                Rule::in([
                    'ASC',
                    'DESC',
                ]),
            ],

            'search' => [
                'nullable',
            ],
        ];

        $errorMessage = [
            'paginate.required' => 'Paginasi tidak boleh kosong !',
            'paginate.in' => 'Paginasi harus berisi Ya atau Tidak !',

            'page.required_if' => 'Halaman tidak boleh kosong !',
            'page.numeric' => 'Halaman harus berupa angka !',
            'page.min' => 'Halaman minimal bernilai 1 !',

            'per_page.required_if' => 'Jumlah per halaman tidak boleh kosong !',
            'per_page.numeric' => 'Jumlah per halaman harus berupa angka !',
            'per_page.min' => 'Jumlah per halaman minimal bernilai 1 !',

            'sort_key.required' => 'Urutan berdasarkan tidak boleh kosong !',
            'sort_key.in' => 'Urutan berdasarkan harus berisi quantity, atau created_at !',

            'sort_order.required' => 'Tipe urutan tidak boleh kosong !',
            'sort_order.in' => 'Tipe urutan harus berisi ASC atau DESC !',
        ];

        $data = [
            'page' => $request->page,
            'per_page' => $request->per_page,
            'sort_key' => $request->sort_key,
            'sort_order' => strtoupper($request->sort_order),
        ];

        Validator::make($data, $schema, $errorMessage)->validate();

        $result = (object) [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }

    /**
     ** Show validation.
     *
     * @param $request
     * @return object
     */
    public function show($request)
    {
        $status = true;
        $message = MessageHelper::validateSuccess();

        $schema = [
            'transaction_id' => [
                'required',
                'numeric',
                Rule::exists('transactions', 'id'),
            ],
        ];

        $errorMessage = [
            'transaction_id.required' => 'ID transaksi tidak boleh kosong !',
            'transaction_id.numeric' => 'ID transaksi harus berupa angka !',
            'transaction_id.exists' => 'ID transaksi tidak ditemukan !',
        ];

        $data = [
            'transaction_id' => $request->transaction_id,
        ];

        Validator::make($data, $schema, $errorMessage)->validate();

        $result = (object) [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }

    /**
     ** Create validation.
     *
     * @param $request
     * @return object
     */
    public function create($request)
    {
        $status = true;
        $message = MessageHelper::validateSuccess();

        $schema = [
            'product_id' => [
                'required',
                'numeric',
                Rule::exists('products', 'id'),
            ],

            'quantity' => [
                'required',
                'numeric',
                'min:1',
            ],
        ];

        $errorMessage = [
            'product_id.required' => 'ID produk tidak boleh kosong !',
            'product_id.numeric' => 'ID produk harus berupa angka !',
            'product_id.exists' => 'ID produk tidak ditemukan !',

            'quantity.required' => 'Jumlah tidak boleh kosong !',
            'quantity.numeric' => 'Jumlah harus berupa angka !',
            'quantity.min' => 'Jumlah minimal bernilai 1 !',
        ];

        $data = [
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ];

        Validator::make($data, $schema, $errorMessage)->validate();

        $result = (object) [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }

    /**
     ** Update validation.
     *
     * @param $request
     * @return object
     */
    public function update($request)
    {
        $status = true;
        $message = MessageHelper::validateSuccess();

        $schema = [
            'transaction_id' => [
                'required',
                'numeric',
                Rule::exists('transactions', 'id'),
            ],

            'product_id' => [
                'required',
                'numeric',
                Rule::exists('products', 'id'),
            ],

            'quantity' => [
                'required',
                'numeric',
                'min:1',
            ],
        ];

        $errorMessage = [
            'transaction_id.required' => 'ID transaksi tidak boleh kosong !',
            'transaction_id.numeric' => 'ID transaksi harus berupa angka !',
            'transaction_id.exists' => 'ID transaksi tidak ditemukan !',

            'product_id.required' => 'ID produk tidak boleh kosong !',
            'product_id.numeric' => 'ID produk harus berupa angka !',
            'product_id.exists' => 'ID produk tidak ditemukan !',

            'quantity.required' => 'Jumlah tidak boleh kosong !',
            'quantity.numeric' => 'Jumlah harus berupa angka !',
            'quantity.min' => 'Jumlah minimal bernilai 1 !',
        ];

        $data = [
            'transaction_id' => $request->transaction_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ];

        Validator::make($data, $schema, $errorMessage)->validate();

        $result = (object) [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }

    /**
     ** Destroy validation.
     *
     * @param $request
     * @return object
     */
    public function destroy($request)
    {
        $status = true;
        $message = MessageHelper::validateSuccess();

        $schema = [
            'transaction_id' => [
                'required',
                'numeric',
                Rule::exists('transactions', 'id'),
            ],
        ];

        $errorMessage = [
            'transaction_id.required' => 'ID transaksi tidak boleh kosong !',
            'transaction_id.numeric' => 'ID transaksi harus berupa angka !',
            'transaction_id.exists' => 'ID transaksi tidak ditemukan !',
        ];

        $data = [
            'transaction_id' => $request->transaction_id,
        ];

        Validator::make($data, $schema, $errorMessage)->validate();

        $result = (object) [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }
}
