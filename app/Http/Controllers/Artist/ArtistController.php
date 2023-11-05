<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Contracts\ArtistContract;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Http\Controllers\BaseController;
use Mail;
use Auth;

class ArtistController extends BaseController
{
    /**
     * @var ArtistContract
     */
    protected $artistRepository;


    /**
     * DesignController constructor.
     * @param ArtistContract $artistRepository
     */
    public function __construct(ArtistContract $artistRepository)
    {
        $this->artistRepository = $artistRepository;
        
    }

    public function index(){

    }

    public function orders(){
        $start_date = (isset($_GET['start_date']) && $_GET['start_date']!='')?$_GET['start_date']:'';
        $end_date = (isset($_GET['end_date']) && $_GET['end_date']!='')?$_GET['end_date']:'';

        $orders = $this->artistRepository->artistOrders($start_date,$end_date);

        return view('artist.order_list',compact('orders'));
    }

    public function transactions(){
        $start_date = (isset($_GET['start_date']) && $_GET['start_date']!='')?$_GET['start_date']:'';
        $end_date = (isset($_GET['end_date']) && $_GET['end_date']!='')?$_GET['end_date']:'';

        $transactions = $this->artistRepository->transactions($start_date,$end_date);

        return view('artist.transactions',compact('transactions'));
    }

    public function followers(){
        $start_date = (isset($_GET['start_date']) && $_GET['start_date']!='')?$_GET['start_date']:'';
        $end_date = (isset($_GET['end_date']) && $_GET['end_date']!='')?$_GET['end_date']:'';

        $followers = $this->artistRepository->followeList($start_date,$end_date);

        return view('artist.followers',compact('followers'));
    }

    public function notifications(){
        $start_date = (isset($_GET['start_date']) && $_GET['start_date']!='')?$_GET['start_date']:'';
        $end_date = (isset($_GET['end_date']) && $_GET['end_date']!='')?$_GET['end_date']:'';

        $notifications = $this->artistRepository->notifications($start_date,$end_date);

        return view('artist.notifications',compact('notifications'));
    }

    public function my_account(){
        return view('artist.my_account');
    }
}