<?php

namespace App\Http\Controllers\Website;

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

    public function SingleProduct($catSlug, $productSlug){
        $category = $this->categoryRepository->SlugWiseCategory($catSlug);
        $products = $this->productRepository->SlugWiseProduct($productSlug);
        return view('website.product.details', compact('products', 'category'));
    }
    
    
}
