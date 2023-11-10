<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Contracts\ProductContract;
use App\Contracts\DesignContract;
use App\Contracts\CategoryContract;
use Illuminate\Http\Request;
use App\Models\Size;
use App\Models\Color;
use App\Http\Controllers\BaseController;
use Mail;
use Auth;

class ProductController extends BaseController
{
    /**
     * @var ProductContract
     */
    protected $productRepository;


    /**
     * ProductController constructor.
     * @param ProductContract $productRepository
     */
    public function __construct(ProductContract $productRepository, CategoryContract $categoryRepository, DesignContract $designRepository){
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->designRepository = $designRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index(Request $request)
    {
        $products = $this->productRepository->AllProductList();
        $this->setPageTitle('All Product', 'List of all uploaded products');
        return view('admin.product.index', compact('products'));
    }
    
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('Product', 'Create Product');
        $categories = $this->categoryRepository->AllCategoryList();
        $designs = $this->designRepository->AllDesignList();
        $sizes = Size::where('deleted_at', 1)->orderBy('name', 'ASC')->get();
        $colors = Color::where('deleted_at', 1)->orderBy('name', 'ASC')->get();
        return view('admin.product.create', compact('categories', 'designs', 'sizes', 'colors'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if(!isset($request->sizes)){
            return $this->responseRedirectBack(' Product size is mandatory.', 'error', true, true);
        }
        if(!isset($request->colors)){
            return $this->responseRedirectBack(' Product color is mandatory.', 'error', true, true);
        }
        $this->validate($request, [
            'name'      =>  'required|max:250',
            'category'      =>  'required',
            'design'      =>  'required',
            'price'      =>  'required',
            'offer_price'      =>  'required',
            'image'     =>  'required|mimes:jpg,jpeg,png|max:1000',
            'description'     =>  'required|max:1000',
            'features'     =>  'required|max:1000',
        ]);

        $params = $request->except('_token');
        $design = $this->productRepository->createProduct($params);
        if (!$design) {
            return $this->responseRedirectBack('Error occurred while creating product.', 'error', true, true);
        }
        return $this->responseRedirect('admin.product.index', 'Product added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        $targetProduct = $this->productRepository->findDesignById($id);
        $this->setPageTitle('Product', 'Edit Product : '.$targetProduct->name);
        
        $categoryIds = explode(', ', $targetProduct->category_id);
        $DesignIds = explode(', ', $targetProduct->design_id);
        $SizeId = explode(', ', $targetProduct->size_id);
        $ColorId = explode(', ', $targetProduct->color_id);

        $categories = $this->categoryRepository->AllCategoryList();
        $designs = $this->designRepository->AllDesignList();
        $sizes = Size::where('deleted_at', 1)->orderBy('name', 'ASC')->get();
        $colors = Color::where('deleted_at', 1)->orderBy('name', 'ASC')->get();
        return view('admin.product.edit', compact('targetProduct', 'categoryIds', 'DesignIds', 'categories', 'designs', 'sizes', 'colors', 'SizeId', 'ColorId'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        if(!isset($request->sizes)){
            return $this->responseRedirectBack(' Product size is mandatory.', 'error', true, true);
        }
        if(!isset($request->colors)){
            return $this->responseRedirectBack(' Product color is mandatory.', 'error', true, true);
        }
        $this->validate($request, [
            'name'      =>  'required|max:250',
            'category'      =>  'required',
            'design'      =>  'required',
            'price'      =>  'required',
            'offer_price'      =>  'required',
            'description'     =>  'required|max:1000',
            'features'     =>  'required|max:1000',
        ]);
        $params = $request->except('_token');
        $design = $this->productRepository->updateProduct($params);
        if (!$design) {
            return $this->responseRedirectBack('Error occurred while updating product.', 'error', true, true);
        }
        return $this->responseRedirectBack('Product updated successfully' ,'success',false, false);
    }
    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $design = $this->productRepository->deleteProduct($id);

        if (!$design) {
            return $this->responseRedirectBack('Error occurred while deleting product.', 'error', true, true);
        }
        return $this->responseRedirect('admin.product.index', 'Product has been deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $params = $request->except('_token');

        $banner = $this->productRepository->updateProductStatus($params);

        if ($banner) {
            return response()->json(array('message'=>'Product status successfully updated'));
        }
    }
}
