<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;

use App\Services\AdminPanel\ProductService;

class ProductController extends Controller
{
    /**
     ** Service instance.
     *
     * @var ProductService
     */
    protected $productService;

    /**
     ** Constructor.
     *
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     ** Index.
     *
     * @return Response
     */
    public function index()
    {
        return view('product.index');
    }

    /**
     ** Datatable.
     *
     * @param Request $request
     * @return Response
     */
    public function datatable(Request $request)
    {
        $result = $this->productService->datatable($request);

        return $result->product;
    }

    /**
     ** Create.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $result = $this->productService->create($request);

        return view('product.create', [
            'productCategory' => $result->productCategory,
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
        $result = $this->productService->store($request);

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
        $result = $this->productService->edit($request);

        return view('product.edit', [
            'product' => $result->product,
            'productCategory' => $result->productCategory,
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
        $result = $this->productService->update($request);

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
        $result = $this->productService->destroy($request);

        return redirect()->back()->with($result->statusNotify, $result->message);
    }
}
