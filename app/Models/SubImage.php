<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubImage extends Model
{
    use HasFactory;
    private static $subImage;
    private static $directory;
    private static $image;
    private static $images;
    private static $imageName;
    private static $imageUrl;

    public static function getImageUrl($image)
    {
        self::$imageName = $image->getClientOriginalName();
        self::$directory = 'product-sub-images/';
        $image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newSubImage($request, $product)
    {
        self::$images = $request->file('other_image');
        foreach (self::$images as $image)
        {
            self::$subImage = new SubImage();
            self::$subImage->product_id  = $product->id;
            self::$subImage->image       = self::getImageUrl($image);
            self::$subImage->save();
        }

    }

    public static function updateSubImage($request,$id)
    {
        self::$subImage = SubImage::where('product_id',$id)->get();
        foreach(self::$subImage as $subImage)
        {
            if(file_exists($subImage->image))
            {
                unlink($subImage->image);
            }

            $subImage->delete();
        }

        self::$images =$request->file('other_image');

        foreach(self::$images as $image)
        {
            self::$subImage = new SubImage();
            self::$subImage->product_id =$id;
            self::$subImage->image = self::getImageUrl($image);
            self::$subImage->save();        
        }

    }
}
