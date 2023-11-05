<?php
namespace App\Repositories;

use App\Models\Design;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\DesignContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class DesignRepository
 *
 * @package \App\Repositories
 */
class DesignRepository extends BaseRepository implements DesignContract
{
    use UploadAble;

    /**
     * DesignRepository constructor.
     * @param Design $model
     */
    public function __construct(Design $model)
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
     * @return Design|mixed
     */
    public function createDesign(array $params)
    {
        try {

            $collection = collect($params);

            $design = new Design;
            $design->title = $collection['title'];
            $design->description = $collection['description'];
            $design->tags = $collection['tags'];
            $design->status = '1';
            $design->user_id = $collection['user_id'];

            $profile_image = $collection['image'];
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("designs/",$imageName);
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
    public function updateDesign(array $params)
    {
        $design = $this->findOneOrFail($params['id']); 
        $collection = collect($params)->except('_token'); 

        $design->title = $collection['title'];
        $design->description = $collection['description'];
        $design->tags = $collection['tags'];
        // /$design->status = $collection['status'];

        $profile_image = $collection['image'];
        $imageName = time().".".$profile_image->getClientOriginalName();
        $profile_image->move("designs/",$imageName);
        $uploadedImage = $imageName;
        $design->image = $uploadedImage;

        $design->save();

        return $design;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteDesign($id)
    {
        $design = $this->findOneOrFail($id);
        $design->delete();
        return $design;
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateDesignStatus(array $params){
        $design = $this->findOneOrFail($params['id']);
        $collection = collect($params)->except('_token');
        $design->status = $collection['check_status'];
        $design->save();

        return $design;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function detailsDesign($id){
        $designs = Design::where('id',$id)->get();
        
        return $designs;
    }
}