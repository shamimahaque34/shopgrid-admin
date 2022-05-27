@extends('master.master')

@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom pb-3">
                <h4 class="card-title">Manage Unit</h4>
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
                    <form action="{{ route('unit.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Unit Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Unit Description</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control summernote" name="description" placeholder=""></textarea>
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
                                <button type="submit" class="btn btn-primary">Create New Unit</button>
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
                <h4 class="card-title">All Unit Info</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="min-width:845px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Unit Name</th>
                                <th>Status</th>
                                <th>Action</th>
                                {{-- <th>Edit</th>
                                <th>Delete</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($units as $unit)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$unit->name}}</td>
                                <td>{{$unit->status == 1 ? 'Published' : "Unpublished"}}</td>
                                {{-- <td>
                                    <a href="{{url('unit/'.$unit->id.'/edit')}}" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{url('unit/'.$unit->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  onclick="return confirm('Are You Sure?')" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    
                                    </form>
                                </td> --}}

                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('unit.edit', $unit->id) }} "><i class="fa fa-edit"></i></a> 

                                    <a class="btn btn-danger btn-sm"  onclick="if(confirm('Are you sure wnat to delete it !!')){ event.preventDefault(); document.getElementById('unit{{ $unit->id }}').submit(); }else{ event.preventDefault(); }" href="{{ route('unit.destroy', $unit->id) }} "><i class="fa fa-trash"></i></a>
                                    
                                    <form id="unit{{ $unit->id }}" action="{{ route('unit.destroy', $unit->id) }}" method="POST">
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