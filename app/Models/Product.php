<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    private static $product;
    private static $directory;
    private static $image;
    private static $imageName;
    private static $imageUrl;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'product-images/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newProduct($request)
    {
        return self::saveBasicInfo(new Product(),$request,self::getImageUrl($request));
        
    }

    public static function saveBasicInfo($product,$request,$imageUrl)
    {
       $product->category_id         = $request->category_id;
       $product->sub_category_id     = $request->sub_category_id;
       $product->brand_id            = $request->brand_id;
       $product->unit_id             = $request->unit_id;
       $product->name                = $request->name;
       $product->code                = $request->code;
       $product->regular_price       = $request->regular_price;
       $product->selling_price       = $request->selling_price;
       $product->short_description   = $request->short_description;
       $product->long_description    = $request->long_description;
       $product->image               = $imageUrl;
       $product->status              = $request->status;
       $product->save();
        return $product; 
    }

    public static function updateProduct($request,$id)
    {
        self::$product = Product::find($id);
        if($request->file('image'))
        {
            if(file_exists(self::$product->image))
            {
                unlink(self::$product->image);
            }

            self::$imageUrl = self::getImageUrl($request);
        }

        else
        {
            self::$imageUrl = self::$product->image;
        }

        self::saveBasicInfo(self::$product,$request,self::$imageUrl);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function sub_category()
    {
        return $this->belongsTo('App\Models\SubCategory');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function unit()
    {
        return $this->belongsTo('App\Models\Unit');
    }

     public function sub_images()
    {
        return $this->hasMany('App\Models\SubImage');
    }
}
