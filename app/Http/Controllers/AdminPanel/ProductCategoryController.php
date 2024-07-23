<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;

use App\Services\AdminPanel\ProductCategoryService;

class ProductCategoryController extends Controller
{
    /**
     ** Service instance.
     *
     * @var ProductCategoryService
     */
    protected $productCategoryService;

    /**
     ** Constructor.
     *
     * @param ProductCategoryService $productCategoryService
     */
    public function __construct(ProductCategoryService $productCategoryService)
    {
        $this->productCategoryService = $productCategoryService;
    }

    /**
     ** Index.
     *
     * @return Response
     */
    public function index()
    {
        return view('product_category.index');
    }

    /**
     ** Datatable.
     *
     * @param Request $request
     * @return Response
     */
    public function datatable(Request $request)
    {
        $result = $this->productCategoryService->datatable($request);

        return $result->productCategory;
    }

    /**
     ** Create.
     *
     * @return Response
     */
    public function create()
    {
        return view('product_category.create');
    }

    /**
     ** Store.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $result = $this->productCategoryService->store($request);

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
        $result = $this->productCategoryService->edit($request);

        return view('product_category.edit', [
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
        $result = $this->productCategoryService->update($request);

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
        $result = $this->productCategoryService->destroy($request);

        return redirect()->back()->with($result->statusNotify, $result->message);
    }
}
