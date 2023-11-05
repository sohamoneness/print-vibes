<?php 
use Illuminate\Support\Facades\DB;

if (!function_exists('sidebar_open')) {
    function sidebar_open($routes = []) {
        $currRoute = Route::currentRouteName();
        $open = false;
        foreach ($routes as $route) {
            if (str_contains($route, '*')) {
                if (str_contains($currRoute, substr($route, 0, strpos($route, '*')))) {
                    $open = true;
                    break;
                }
            } else {
                if ($currRoute === $route) {
                    $open = true;
                    break;
                }
            }
        }

    return $open ? 'active' : '';
    }
}

if (!function_exists('imageResizeAndSave')) {
    function imageResizeAndSave($imageUrl, $type = 'categories', $filename)
    {
        if (!empty($imageUrl)) {
                                                    
            //save 60x60 image
            \Storage::disk('public')->makeDirectory($type.'/60x60');
            $path60X60     = storage_path('app/public/'.$type.'/60x60/'.$filename);
            $canvas = \Image::canvas(60, 60);
            $image = \Image::make($imageUrl)->resize(60, 60,
                    function($constraint) {
                        $constraint->aspectRatio();
                    });
            $canvas->insert($image, 'center');
            $canvas->save($path60X60, 70); 
            
            //save 350X350 image
            \Storage::disk('public')->makeDirectory($type.'/350x350');
            $path350X350     = storage_path('app/public/'.$type.'/350x350/'.$filename);
            $canvas = \Image::canvas(350, 350);        
            $image = \Image::make($imageUrl)->resize(350, 350,
                    function($constraint) {
                        $constraint->aspectRatio();
                    });
            $canvas->insert($image, 'center');
            $canvas->save($path350X350, 75);

            return $filename;
        } else { return false; }
    }

    function customersCount($id){  
        $customerCount = DB::table('customer_data_set_sub')  
                ->select(DB::raw('count(*) as customer_count_number')) 
                ->where('data_set_main_id','=', $id)  
                ->get();
        return  $customerCount;

    }
    function DataSetcustomersCount($id){  
        $customerCount = DB::table('customer_data_set_child')  
                ->select(DB::raw('count(*) as customer_count_number')) 
                ->where('customer_data_id','=', $id)  
                ->get();
        return  $customerCount;
    }
    
    function getaddress($lat,$lng)
  {
     $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false&key=AIzaSyDzyb77sOPwJdR8WINUuDX5EG51--WJDJ4';
     $json = @file_get_contents($url);
     $data=json_decode($json);
     $status = $data->status;
    $data = $data->results[0]->formatted_address;
     if($status=="OK")
     {
       return $data;
     }
     else
     {
       return "Inactive";
     }
  }

}