<?php 
use Illuminate\Support\Facades\DB;

function DiscountPercentage($price, $offer_price){
    $originalPrice =$price;
    $discountAmount =$originalPrice-$offer_price;
    $discountPercentage = ($discountAmount / $originalPrice) * 100;
    return $discountPercentage;
}
