<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','image','status'];

    

    private static $subCategory;
    private static $image;
    private static $imageName;
    private static $directory;
    private static $imageUrl;
    private static $url;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory ='sub-category-image/';
        self::$image->move(self::$directory,self::$imageName);
        return self::$directory.self::$imageName;

    }

    public static function newSubCategory($request)
    {
        self::$subCategory = new SubCategory();
        self::$subCategory->category_id =$request->category_id;
        self::$subCategory->name = $request->name;
        self::$subCategory->description =$request->description;
        self::$subCategory->image =self::getImageUrl($request);
        self::$subCategory->save();
    }

    public static function updateSubCategory($request, $id)
    {
        self::$subCategory = SubCategory::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$subCategory->image))
            {
                unlink(self::$subCategory->image);
            }
            self::$url = self::getImageUrl($request);
        }
        else
        {
            self::$url = self::$subCategory->image;
        }
        self::$subCategory->category_id =$request->category_id;
        self::$subCategory->name = $request->name;
        self::$subCategory->description =$request->description;
        self::$subCategory->image =self::$url;
        self::$subCategory->update();
    }


    public static function deleteSubCategory($id)
    {
        self::$subCategory = SubCategory::find($id);
        if (file_exists(self::$subCategory->image))
        {
            unlink(self::$subCategory->image);
        }
        self::$subCategory->delete();
    }


    public function category()
    {
        return $this->belongsTo('App\models\Category');
    }

   
}


