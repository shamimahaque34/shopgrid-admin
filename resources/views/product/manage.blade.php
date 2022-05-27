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
                    <table id="example" class="display" style="min-width:845px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Category Name</th>
                                <th>image</th>
                                <th>Selling Price</th>
                                <th>Status</th>
                                {{-- <th>Edit</th>
                                <th>Delete</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category->name}}</td>
                                <td><img src="{{asset($product->image)}}" alt="" height="60" width="80"/></td>
                                <td>{{$product->selling_price}}</td>
                                <td>{{$product->status == 1 ? 'Published' : "Unpublished"}}<td>
                                <td>
                                    <a class="btn btn-info btn-sm" title="View Product Detail" href="{{ route('product.detail', ['id'=>$product->id]) }} "><i class="fa fa-book"></i></a> 

                                    <a class="btn btn-success btn-sm" title=" Product Edit" href="{{ route('product.edit', ['id'=>$product->id]) }} "><i class="fa fa-edit"></i></a> 

                                     <a class="btn btn-danger btn-sm" title=" Product Delete" href=""><i class="fa fa-trash"></i></a> 
                                </td>
                            </tr>
                           @endforeach
                         </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
   
</div>

@endsection