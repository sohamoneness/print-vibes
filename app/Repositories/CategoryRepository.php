<?php
namespace App\Repositories;

use App\Models\Category;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\CategoryContract;
use Illuminate\Database\QueryException;
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

        $Category->title = $collection['title'];
        $Category->description = $collection['description'];
        $Category->tags = $collection['tags'];
        // /$Category->status = $collection['status'];
        
        if(isset($collection['image'])){
            $profile_image = $collection['image'];
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("Categorys/",$imageName);
            $uploadedImage = $imageName;
            $Category->image = $uploadedImage;
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
        $Categorys = Category::orderBy('name', 'ASC')->where('deleted_at', 1)->paginate(20);
        return $Categorys;
    }

}
