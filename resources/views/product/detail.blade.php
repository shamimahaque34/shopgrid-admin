@extends('master.master')

@section('body')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom pb-3">
                <h4 class="card-title">All Product Info</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table  class="display table table-bordered table-hover" style="min-width:845px">
                        <tr>
                            <th>Product Id</th>
                            <td>{{$product->id}}</td>
                        </tr>

                         <tr>
                            <th>Product Name</th>
                            <td>{{$product->name}}</td>
                        </tr>

                        <tr>
                            <th>Product Code</th>
                            <td>{{$product->code}}</td>
                        </tr>

                        <tr>
                            <th>Product Category Name</th>
                            <td>{{$product->category->name}}</td>
                        </tr>

                        <tr>
                            <th>Product Sub Category Name</th>
                            <td>{{$product->sub_category->name}}</td>
                        </tr>

                        <tr>
                            <th>Product Unit Name</th>
                            <td>{{$product->unit->name}}</td>
                        </tr>

                        <tr>
                            <th>Product Brand Name</th>
                            <td>{{$product->brand->name}}</td>
                        </tr>

                        <tr>
                            <th>Product Regular Price</th>
                            <td>{{$product->regular_price}}</td>
                        </tr>

                        <tr>
                            <th>Product Selling Price</th>
                            <td>{{$product->selling_price}}</td>
                        </tr>

                        <tr>
                            <th>Product Short Description</th>
                            <td>{!! $product->short_description !!}</td>
                        </tr>

                        <tr>
                            <th>Product Long Description</th>
                            <td>{!! $product->long_description !!}</td>
                        </tr>

                        <tr>
                            <th>Product Feature Image</th>
                            <td><img src="{{asset($product->image)}}" alt="" height="200" width="250" /></td>
                        </tr>

                        <tr>
                            <th>Product Other Image</th>
                            <td>
                                @foreach($product->sub_images as $sub_image)
                                   <img src="{{asset($sub_image->image)}}" alt="" height="100" width="150" />
                                @endforeach
                            </td>
                        </tr>

                        <tr>
                            <th></th>
                            <td></td>
                        </tr>

                        <tr>
                            <th></th>
                            <td></td>
                        </tr>

                        <tr>
                            <th></th>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
   
</div>

@endsection