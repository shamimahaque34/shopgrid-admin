<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\subCategory;
use App\Models\Product;
use App\Models\subImage;


class APIController extends Controller
{
    private $categories;
    private $subCategories;
    private $result;
    private $resultSub;
    private $products;

    public function getAllPublishedCategory()
    {
        $this->categories = Category::where('status',1)->get();
        foreach($this->categories as $key=>$category)
        {
            $this->subCategories = subCategory::where('category_id',$category->id)->get();
            if($this->subCategories)
            {
                foreach($this->subCategories as $key1=>$subCategory)
                {
                    $this->resultSub[$key1]['id'] = $subCategory->id;
                    $this->resultSub[$key1]['name'] = $subCategory->name;
                }
            }

            $this->result[$key]['id'] = $category->id;
            $this->result[$key]['name'] = $category->name;
            $this->result[$key]['sub_category'] = $this->resultSub;
            $this->resultSub = [];
        }

        return response()->json($this->result);
    }

    public function getAllTrendingProduct()
    {
        $this->products = Product::orderBy('id','desc')->take(8)->get(['id','name','selling_price','image']);
        foreach($this->products as $product)
        {
            $product->image =asset($product->image);


        }

        return response()->json($this->products);    
    }

    public function getProductBasicInfo($id)
    {
      $this->product = Product::find($id);
      $this->subImages =SubImage::where('product_id',$id)->get();
      foreach($this->subImages as $subImage)
      {
           $subImage->image =asset($subImage->image);
      }

      $this->result =[
          'id'           => $this->product->id,
          'name'         => $this->product->name,
          'category'     => $this->product->category->name,
          'brand'        => $this->product->brand->name,
          'regular_price'=> $this->product->regular_price,
          'selling_price'=> $this->product->selling_price,
          'description'  => $this->product->short_description,
          'main_image'   => asset($this->product->image),
          'image'        => $this->subImages[0]->image,
          'images'       => $this->subImages,
      ];

      return response()->json($this->result);
    }

    public function productByCategory($id)
    {
        $this->products =Product::where('category_id',$id)->orderBy('id','desc')->take(8)->get('id','name','selling_price','image');
        foreach($this->products as $product)
        {
            $product->image =asset($product->image);
        }

        return response()->json($this->products);
    }

    public function getProductDetailInfo($id)

    {
        return response()->json(Product::find($id)->long_description);
    }

    
}
