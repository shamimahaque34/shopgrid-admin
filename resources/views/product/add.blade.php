@extends('master.master')

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom pb-3">
                    <h4 class="card-title">Add New Product</h4>
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
                        <form action="{{route('product.new')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="category_id" required onchange="getSubCategoryByCategory(this.value)">
                                        <option value="" selected disabled> -- Select Category Name -- </option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
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
                                            <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
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
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
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
                                            <option value="{{$unit->id}}">{{$unit->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" placeholder="Product Name"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Product Code</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="code" placeholder="Product Code"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Product Regular Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="regular_price" placeholder="Regular Price"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Product Selling Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="selling_price" placeholder="Selling Price"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control summernote" name="short_description" placeholder="Short Description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Long Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control summernote" name="long_description" placeholder="Long Description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Feature Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control-file" name="image" accept="image/*"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Other Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control-file" name="other_image[]" multiple accept="image/*"/>
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <div class="row">
                                    <label class="col-form-label col-sm-2 pt-0">Status</label>
                                    <div class="col-sm-10">
                                        <label><input type="radio" name="status" value="1" checked> Published</label>
                                        <label><input type="radio" name="status" value="0"> Unpublished</label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Create New Product</button>
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
