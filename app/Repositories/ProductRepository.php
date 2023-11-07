<?php
namespace App\Repositories;

use App\Models\Design;
use App\Models\Product;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\ProductContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class ProductRepository
 *
 * @package \App\Repositories
 */
class ProductRepository extends BaseRepository implements ProductContract
{
    use UploadAble;

    /**
     * ProductRepository constructor.
     * @param Product $model
     */
    public function __construct(Product $model)
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
    public function listDesigns(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findDesignById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @param array $params
     * @return Product|mixed
     */
    public function createProduct(array $params)
    {
        try {
            $collection = collect($params);
            $design = new Product;
            $design->name = $collection['name'];

            $category = implode(', ', $collection['category']);
            $design->category_id = $category;

            $designString = implode(', ', $collection['design']);
            $design->design_id = $designString;

            $sizesString = implode(', ', $collection['sizes']);
            $design->size_id = $sizesString;

            $colorString = implode(', ', $collection['colors']);
            $design->color_id = $colorString;

            $design->description = $collection['description'];
            $design->features = $collection['features'];
            $design->meta_title = $collection['meta_title'];
            $design->meta_keyword = $collection['meta_keyword'];
            $design->meta_description = $collection['meta_description'];
            $design->price = $collection['price'];
            $design->offer_price = $collection['offer_price'];
            $design->status = '1';
            $profile_image = $collection['image'];
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("products/",$imageName);
            $uploadedImage = $imageName;
            $design->image = $uploadedImage;
            $design->save();
            return $design;
            
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateProduct(array $params){
        $design = $this->findOneOrFail($params['id']); 
        $collection = collect($params)->except('_token'); 
        $design->name = $collection['name'];

        $category = implode(', ', $collection['category']);
        $design->category_id = $category;

        $designString = implode(', ', $collection['design']);
        $design->design_id = $designString;

        $sizesString = implode(', ', $collection['sizes']);
        $design->size_id = $sizesString;

        $colorString = implode(', ', $collection['colors']);
        $design->color_id = $colorString;

        $design->description = $collection['description'];
        $design->features = $collection['features'];
        $design->meta_title = $collection['meta_title'];
        $design->meta_keyword = $collection['meta_keyword'];
        $design->meta_description = $collection['meta_description'];
        $design->price = $collection['price'];
        $design->offer_price = $collection['offer_price'];
        $design->status = '1';

        if(isset($collection['image'])){
            $profile_image = $collection['image'];
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("products/",$imageName);
            $uploadedImage = $imageName;
            $design->image = $uploadedImage;
        }
        $design->save();
        return $design;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteProduct($id)
    {
        $design = $this->findOneOrFail($id);
        $design->deleted_at = 0;
        $design->save();
        return $design;
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateProductStatus(array $params){
        $design = $this->findOneOrFail($params['id']);
        $collection = collect($params)->except('_token');
        $design->status = $collection['check_status'];
        $design->save();

        return $design;
    }

    
    public function AllProductList(){
        $designs = Product::latest('id')->where('deleted_at', 1)->paginate(20);
        return $designs;
    }

}
