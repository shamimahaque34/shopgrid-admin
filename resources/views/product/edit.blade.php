@extends('master.master')

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom pb-3">
                    <h4 class="card-title">Edit Product</h4>
                </div>
                <div class="card-body">
                    @if($message = Session::get('message'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{$message}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="basic-form">
                        <form action="{{route('product.update',['id'=>$product->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="category_id" required onchange="getSubCategoryByCategory(this.value)">
                                        <option value="" selected disabled> -- Select Category Name -- </option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Sub Category Name</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="sub_category_id" required id="subCategory">
                                        <option value="" selected disabled> -- Select Sub Category Name -- </option>
                                        @foreach($sub_categories as $sub_category)
                                            <option value="{{$sub_category->id}}" {{$product->sub_category_id == $sub_category->id ? 'selected' : ''}}>{{$sub_category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Brand Name</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="brand_id" required>
                                        <option value="" selected disabled> -- Select Brand Name -- </option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}" {{$product->brand_id == $brand->id ? 'selected' : ''}}>{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Unit Name</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="unit_id" required>
                                        <option value="" selected disabled> -- Select Unit Name -- </option>
                                        @foreach($units as $unit)
                                            <option value="{{$unit->id}}" {{$product->unit_id == $unit->id ? 'selected' : ''}}>{{$unit->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" value="{{ $product->name}}" placeholder="Product Name"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Product Code</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="code"  value="{{ $product->code}}"placeholder="Product Code"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Product Regular Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="regular_price"  value="{{ $product->regular_price}}" placeholder="Regular Price"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Product Selling Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="selling_price"  value="{{ $product->selling_price}}" placeholder="Selling Price"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control summernote" name="short_description" placeholder="Short Description">{{$product->short_description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Long Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control summernote" name="long_description" placeholder="Long Description">{{$product->long_description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Feature Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control-file" name="image" accept="image/*"/>
                                    <img src="{{asset($product->image)}}" alt="" height="200" width="250" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Other Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control-file" name="other_image[]" multiple accept="image/*"/>
                                    @foreach($product->sub_images as $sub_image)
                                   <img src="{{asset($sub_image->image)}}" alt="" height="100" width="150" style="margin-right:10px ;" />
                                @endforeach
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <div class="row">
                                    <label class="col-form-label col-sm-2 pt-0">Status</label>
                                    <div class="col-sm-10">
                                        <label><input type="radio" {{$product->status == 1 ? 'checked' : ''}} name="status" value="1" checked> Published</label>
                                        <label><input type="radio" {{$product->status == 0 ? 'checked' : ''}} name="status" value="0"> Unpublished</label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Edit Product</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function getSubCategoryByCategory(id)
        {
            $.ajax({
                method: "GET",
                url: "{{url('/get-sub-category-by-category')}}",
                data: {id:id},
                type: 'JSON',
                success: function (response) {
                    var select = $('#subCategory');
                    select.empty();
                    var option = '';
                    option += '<option value="" selected disabled> -- Select Sub Category Name -- </option>';
                    $.each(response, function (key, value) {
                        option += '<option value="'+value.id+'">'+value.name+'</option>';
                    });
                    select.append(option);
                }
            });
        }
    </script>
@endsection
