<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiImage extends Model
{
    use HasFactory;



    protected $guarded=[];
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function multiImage($ProductImage): string
{
    if ($ProductImage !== null) {
        return asset('uploads/ProductMuliImage/' . $ProductImage);
    } else {
        return asset('uploads/noimage.png');
    }
}
}
