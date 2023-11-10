<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\CategoryContract;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CategoryRepository
 *
 * @package \App\Repositories
 */
class CategoryRepository extends BaseRepository implements CategoryContract
{
    use UploadAble;

    /**
     * CategoryRepository constructor.
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listCategorys(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findCategoryById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @param array $params
     * @return Category|mixed
     */
    public function createCategory(array $params)
    {
        try {
            $collection = collect($params);
            $Category = new Category;
            $Category->name = $collection['name'];
            $Category->meta_title = $collection['meta_title'];
            $Category->meta_keyword = $collection['meta_keyword'];
            $Category->meta_description = $collection['meta_description'];
            $Category->status = '1';
             // slug generate
             $slug = \Str::slug($collection['name'], '-');
             $slugExistCount = Category::where('slug', $slug)->count();
             if ($slugExistCount > 0) $slug = $slug.'-'.($slugExistCount+1);
             $Category->slug = $slug;

            $upload_path = "Category/";
            $profile_image = $collection['image'];
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move($upload_path, $imageName);
            $uploadedImage = $imageName;
            $Category->image = $upload_path.$uploadedImage;
            $Category->save();

            return $Category;
            
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCategory(array $params)
    {
        $Category = $this->findOneOrFail($params['id']); 
        $collection = collect($params)->except('_token'); 

        $Category->name = $collection['name'];
        $Category->meta_title = $collection['meta_title'];
        $Category->meta_keyword = $collection['meta_keyword'];
        $Category->meta_description = $collection['meta_description'];

        $slug = \Str::slug($collection['name'], '-');
        $slugExistCount = Category::where('slug', $slug)->where('id', '!=', $Category->id)->count();
        if ($slugExistCount > 0) $slug = $slug.'-'.($slugExistCount+1);

        $Category->slug = $slug;
        
        if(isset($collection['image'])){
            $upload_path = "Category/";
            $profile_image = $collection['image'];
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move($upload_path, $imageName);
            $uploadedImage = $imageName;
            $Category->image = $upload_path.$uploadedImage;
        }
        $Category->save();

        return $Category;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteCategory($id)
    {
        $Category = $this->findOneOrFail($id);
        $Category->deleted_at = 0;
        $Category->save();
        return $Category;
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCategoryStatus(array $params){
        $Category = $this->findOneOrFail($params['id']);
        $collection = collect($params)->except('_token');
        $Category->status = $collection['check_status'];
        $Category->save();

        return $Category;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function detailsCategory($id){
        $Categorys = Category::where('id',$id)->get();
        return $Categorys;
    }
    
    public function AllCategoryList(){
        $Categorys = Category::orderBy('name', 'ASC')->where('deleted_at', 1)->where('status', 1)->paginate(20);
        return $Categorys;
    }
    public function ALLCategoryByNameID(){
        $Categorys = Category::select('name', 'id')->orderBy('name', 'ASC')->where('deleted_at', 1)->where('status', 1)->get();
        return $Categorys;
    }

    public function SlugWiseCategory($slug){
        $category = Category::where('slug',$slug)->first();
        if ($category == null){
            return false;
        }else{
            return $category;
        }
        
    }
    public function CategoryWiseProduct($catId){
        $products = Product::with('DesignData')->where('status', 1)->where('deleted_at', 1)->paginate();
     
        $CatArrayId = [];
        if(count($products)>0)
        foreach ($products as $product){
            $CategoryArray = explode(', ', $product['category_id']);
            if(in_array($catId, $CategoryArray)){
                $CatArrayId[] = $product;
            }
        }
        return $CatArrayId;
    }

}
