<?php
namespace App\Repositories;

use App\Models\UserTransaction;
use App\Models\Order;
use App\Models\Notification;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\ArtistContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;

/**
 * Class PageRepository
 *
 * @package \App\Repositories
 */
class ArtistRepository extends BaseRepository implements ArtistContract
{
    use UploadAble;

    /**
     * ArtistRepository constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param string $start_date
     * @param string $end_date
     * @return mixed
     */
    public function followeList($start_date,$end_date){
        $artist_id = Auth::user()->id;

        $sql = "select followers.*, users.name, users.email
                              from followers join users
                              on (followers.followed_by = users.id)
                              where followers.user_id=$artist_id";

        if($start_date!='' && $end_date!=''){
            $where = " and created_at>='$start_date' and created_at<='$end_date'";
        }else{
            $where = "";
        }

        $followers = DB::select($sql.$where);

        return $followers;
    } 

    /**
     * @param string $start_date
     * @param string $end_date
     * @return mixed
     */
    public function transactions($start_date,$end_date){
        $artist_id = Auth::user()->id;

        $transactions = UserTransaction::where('user_id',$artist_id)
                    ->when($start_date, function($query) use ($start_date){
                        $query->where('created_at', '>=', $start_date);
                    })
                    ->when($end_date, function($query) use ($end_date){
                        $query->where('created_at', '<=', $end_date);
                    })
                    ->get();

        return $transactions;
    }

    /**
     * @param string $start_date
     * @param string $end_date
     * @return mixed
     */
    public function artistOrders($start_date,$end_date){
        $artist_id = Auth::user()->id;

        $orders = Order::where('status','!=','0')
                    ->when($start_date, function($query) use ($start_date){
                        $query->where('created_at', '>=', $start_date);
                    })
                    ->when($end_date, function($query) use ($end_date){
                        $query->where('created_at', '<=', $end_date);
                    })
                    ->get();

        return $orders;
    }

    /**
     * @param string $start_date
     * @param string $end_date
     * @return mixed
     */
    public function notifications($start_date,$end_date){
        $artist_id = Auth::user()->id;

        $notifications = Notification::where('user_id',$artist_id)
                    ->when($start_date, function($query) use ($start_date){
                        $query->where('created_at', '>=', $start_date);
                    })
                    ->when($end_date, function($query) use ($end_date){
                        $query->where('created_at', '<=', $end_date);
                    })
                    ->get();

        return $notifications;
    }
}
?>