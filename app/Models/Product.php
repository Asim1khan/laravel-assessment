<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['product_name','product_color','selling_price','product_thambnail'];
    use HasFactory;
    public function prices()
{
    return $this->hasMany(ClientProductPrice::class);
}
public function thumbnil($thumbnil): string
{
    if ($thumbnil !== null) {

        return asset('uploads/ProductThambnil/' . $thumbnil);
    } else {
        return asset('uploads/noimage.png');
    }
}
public function getSpecialPriceForClient($productId, $userId)
{

    // Query the product_prices table to retrieve the special price
    $productPrice = ClientProductPrice::where('product_id', $productId)
        ->where('user_id', $userId)
        ->first();
    // If a special price is found, return it; otherwise, return the base price
    return $productPrice ? $productPrice->price : null;
}

}
