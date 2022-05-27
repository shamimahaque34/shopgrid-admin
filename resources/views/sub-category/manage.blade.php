@extends('master.master')

@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom pb-3">
                <h4 class="card-title">Manage Sub Category</h4>
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
                    <form action="{{ route('sub-category.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                                <input type="text" class="form-control" name="name" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Sub Category  Description</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control summernote" name="description" placeholder=""></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Sub Category Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" name="image" placeholder="">
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
                                <button type="submit" class="btn btn-primary">Create New Sub Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
   
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom pb-3">
                <h4 class="card-title">All Sub Category Info</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="min-width:845px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                {{-- <th>Edit</th>
                                <th>Delete</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sub_categories as $sub_category)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$sub_category->category->name}}</td>
                                <td>{{$sub_category->name}}</td>
                                <td><img src="{{asset($sub_category->image)}}" alt="" height="60" width="80"/></td>
                                <td>{{$sub_category->status == 1 ? 'Published' : "Unpublished"}}</td>
                                {{-- <td>
                                    <a href="{{url('sub-category/'.$sub_category->id.'/edit')}}" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{url('sub-category/'.$sub_category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  onclick="return confirm('Are You Sure?')" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    
                                    </form>
                                </td> --}}

                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('sub-category.edit', $sub_category->id) }} "><i class="fa fa-edit"></i></a> 

                                    <a class="btn btn-danger btn-sm"  onclick="if(confirm('Are you sure wnat to delete it !!')){ event.preventDefault(); document.getElementById('sub-category{{ $sub_category->id }}').submit(); }else{ event.preventDefault(); }" href="{{ route('sub-category.destroy', $sub_category->id) }} "><i class="fa fa-trash"></i></a>
                                    
                                    <form id="sub-category{{ $sub_category->id }}" action="{{ route('sub-category.destroy', $sub_category->id) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                    </form>
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