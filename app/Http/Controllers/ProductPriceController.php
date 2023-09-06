<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\FileUpload;
use App\Models\MultiImage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;

class ProductPriceController extends Controller
{
      public function AddProduct()
      {
          return view('admin.product.add_product');
      }
      public function StoreProduct(Request $request)
      {
             $productThambnil='';
             $multiimage='';
        if ($request->hasfile("product_thambnail")) {
            $image = $request->file("product_thambnail");
            $productThambnil=FileUpload::FileUpload($image, "ProductThambnil");
        }
        $product_id=  Product::insertGetId([
            'product_name'=>$request->product_name,
            'product_color'=>$request->product_color,
            'selling_price'=>$request->selling_price,
            'product_thambnail'=>$productThambnil,
            'created_at'=>Carbon::now(),

        ]);
        if ($request->hasfile("multi_imag")) {
            $images = $request->file("multi_imag");
           foreach($images as $image)
           {
              $multiimage=FileUpload::FileUpload($image, "ProductMuliImage");
               MultiImage::insert([
                'product_id'=>$product_id,
                'photo_name'=>$multiimage,
                'created_at'=>Carbon::now(),
                ]);
           }

            }
            $notification = array(
                'message' => 'Product Data Add Successfully',
                'alert-type' => 'success' );
            return redirect()->route('manage-product')->with($notification);
    }

    public function ManageProduct()
    {
       $products=Product::latest()->get();
       return view('admin.product.product_view',compact('products'));
    }

    public function EditProduct($id)
    {
        $multimges=MultiImage::where('product_id',Crypt::decrypt($id))->get();
       $product=Product::findOrFail(Crypt::decrypt($id));
        return view('admin.product.product_edit',compact('product','multimges'));

    }

    public function UpdateProduct(Request $request)
        {
            Product::where('id',$request->id)->update([
                'product_name'=>$request->product_name,
                'product_color'=>$request->product_color,
                'selling_price'=>$request->selling_price,
                'updated_at'=>Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Product Data Add Successfully',
                'alert-type' => 'success' );
            return redirect()->route('manage-product')->with($notification);
        }

        public function ProductDelete($id)
        {
            $product=Product::findOrFail(Crypt::decrypt($id));
            FileUpload::FileDelete($product->product_thambnail,'ProductThambnil');



            $image=MultiImage::where('product_id',Crypt::decrypt($id))->get();
            foreach($image as $img)
            {

                FileUpload::FileDelete($img->photo_name,'ProductMuliImage');


            }
            $product->delete();
            $notification = array(
                'message' => 'Prod product Delte successfully',
                'alert-type' => 'success' );
            return redirect()->back()->with($notification);
        }
    public function UpdateProductThumbnil(Request $request)
    {
             //in case if admin not update old image
             // remain same so that why i assign old image if user want to update old image will e override with new one
                $productThambnil=$request->old_image;
                if ($request->hasfile("product_thambnail")) {
                    $image = $request->file("product_thambnail");
                    $productThambnil=FileUpload::FileUpload($image, "ProductThambnil",$request->old_image? $request->old_image:'');
             Product::findOrFail($request->id)->update([
                'product_thambnail'=>$productThambnil,
               'updated_at'=>Carbon::now(),
             ]);
            }
             $notification = array(
                'message' => 'Product Data update without Image Successfully',
                'alert-type' => 'success' );
            return redirect()->route('manage-product')->with($notification);
    }

    public function DeleteProductMultiImage( $id)
    {

        $oldimg=MultiImage::findOrFail(Crypt::decrypt($id));
          if($oldimg)
          {
            FileUpload::FileDelete($oldimg->photo_name,'ProductThambnil');
     $oldimg->delete();
          }
        $notification = array(
           'message' => 'Product Data delte  Image Successfully',
           'alert-type' => 'success' );

       return redirect()->route('manage-product')->with($notification);
    }

       // for multiple image
       public function UpdateProductImg(Request $request)
       {                 $multiimage='';

                  $images=$request->multi_img;
                  if($images)
                  {
                       foreach($images as $id =>$img)
                      {
                         $imgDel=MultiImage::findOrFail(Crypt::decrypt($id));
                         $multiimage=FileUpload::FileUpload($img, "ProductMuliImage",$imgDel->photo_name?$imgDel->photo_name:'');
                          MultiImage::where('id',Crypt::decrypt($id))->update([
                           'photo_name'=>$multiimage,
                           'updated_at'=>Carbon::now(),
                           ]);
                           $notification = array(
                            'message' => 'Product Data delte  Image Successfully',
                            'alert-type' => 'success' );

                        return redirect()->route('manage-product')->with($notification);
                     }
                      }

                      return redirect()->back('');


               }

}
