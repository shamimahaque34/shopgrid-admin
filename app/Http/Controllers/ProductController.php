<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubImage;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $id;
    private $product;
    private $subCategories;



    public function index()
    {
        return view('product.add', [
            'categories'    => Category::where('status', 1)->get(),
            'sub_categories'=> SubCategory::where('status', 1)->get(),
            'brands'        => Brand::where('status', 1)->get(),
            'units'         => Unit::where('status', 1)->get(),
        ]);
    }

    public function getSubCategoryByCategory()
    {
        $this->id = $_GET['id'];
        $this->subCategories = SubCategory::where('category_id', $this->id)->get();
        return response()->json($this->subCategories);
    }

    public function create(Request $request)
    {
        $this->product = Product::newProduct($request);
        SubImage::newSubImage($request, $this->product);
        return redirect()->back()->with('message', 'Product info create successfully.');
    }

    public function manage()
    {   
       $this->products = Product::orderBy('id','desc')->get();
       return view('product.manage',['products'=>$this->products]);
    }

    public function detail($id)
    {
        return view('product.detail',['product'=>Product::find($id)]);
    }

    public function edit($id)
    {
        return view('product.edit',[
            'product'=>Product::find($id),
            'categories'    => Category::where('status', 1)->get(),
            'sub_categories'=> SubCategory::where('status', 1)->get(),
            'brands'        => Brand::where('status', 1)->get(),
            'units'         => Unit::where('status', 1)->get(),
        ]);
    }

    public function update(Request $request, $id)
    {
        Product::updateProduct($request,$id);

        if($request->file('other_image'))
        {
            SubImage::updateSubImage($request,$id);
        }

        return redirect('/manage-product')->with('message','Product Info Update Successfully.');
    }
}
