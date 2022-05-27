@extends('master.master')

@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom pb-3">
                <h4 class="card-title">Edit Sub Category</h4>
            </div>
            <div class="card-body">
                @if($message = Session::get('message'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ $message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                <div class="basic-form">
                    {{-- <form action="{{url('sub-category/'.$sub_category->id)}}" method="POST" enctype="multipart/form-data"> --}}
                        <form action="{{route('sub-category.update',$sub_category->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="category_id" required >
                                    <option value="" selected disabled>-- Select Category Name --</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{ $category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Sub Category Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  value="{{$sub_category->name}}" name="name" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Sub Category  Description</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control"  name="description" placeholder="">{{$sub_category->description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Sub Category Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" name="image" placeholder="">
                                <img src="{{asset($sub_category->image)}}" alt="" height="60" width="80"/>
                            </div>
                        </div>
                       
                        <fieldset class="form-group">
                            <div class="row">
                                <label class="col-form-label col-sm-2 pt-0">Status</label>
                                <div class="col-sm-10">
                                   <label><input class=""type="radio" name="status" value="1" checked>Published</label>
                                   <label><input class=""type="radio" name="status" value="0">Unpublished</label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group row">
                            <div class="col-sm-10">
                             <label class="col-form-label col-sm-2 "> </label>
                                <button type="submit" class="btn btn-primary">Edit Sub Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
   
</div>
@endsection