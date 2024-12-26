@extends('admin.layout')
@section('admin_content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Category Table</h5>
          </div><!-- sl-page-title -->
  
          <div class="card pd-20 pd-sm-40">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addNewModalId">
                    Add New
                </button>
            </div>
            <br>
  
            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">S/N</th>
                    <th class="wd-15p">Name</th>
                    <th class="wd-15p">Status</th>
                    <th class="wd-5p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($category as $key=>$categoryData)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$categoryData->category_name}}</td>
                            <td class="{{ $categoryData->status == 1 ? '' : 'text-danger' }}">
                                {{ $categoryData->status == 1 ? 'Active' : 'Inactive' }}
                            </td>
                            <td style="width: 100px;">
                                <div class="d-flex justify-content-end" style="gap: 10px;">
                                    <button type="button" class="btn btn-info btn-sm" style="width: 70px; padding: 5px;" data-bs-toggle="modal" data-bs-target="#editNewModalId{{$categoryData->id}}">Edit</button>
                                    <a href="{{route('categories.destroy',$categoryData->id)}}" class="btn btn-danger btn-sm" style="width: 80px; padding:5px;" data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$categoryData->id}}">Delete</a>
                                </div>
                            </td>
                                                                                                          
                             <!--Edit Modal -->
                             <div class="modal fade" id="editNewModalId{{$categoryData->id}}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editNewModalLabel{{$categoryData->id}}" aria-hidden="true">
                                <div class="modal-dialog  modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="addNewModalLabel{{$categoryData->id}}">Edit</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{route('categories.update',$categoryData->id)}}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label text-primary">Name</label>
                                                            <input type="text" id="name" name="category_name" value="{{$categoryData->category_name}}"
                                                                   class="form-control" placeholder="Enter Category Name" required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="example-select" class="form-label fw-bold text-primary">Status</label>
                                                            <select 
                                                                name="status" 
                                                                class="form-select border border-primary shadow-sm py-2 px-3" 
                                                                style="border-radius: 8px; font-size: 16px;">
                                                                <option value="1" {{ $categoryData->status === 1 ? 'selected' : '' }}>Active</option>
                                                                <option value="0" {{ $categoryData->status === 0 ? 'selected' : '' }}>Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <button class="btn btn-primary" type="submit">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Delete Modal -->
                            <div id="danger-header-modal{{$categoryData->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel{{$categoryData->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-danger">
                                            <h4 class="modal-title" id="danger-header-modalLabe{{$categoryData->id}}l">Delete</h4>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="mt-0">Are You Went to Delete this ? </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <a href="{{route('categories.destroy',$categoryData->id)}}" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Add Modal -->
                <div class="modal fade" id="addNewModalId" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addNewModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered"> <!-- Same size as Edit Modal -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="addNewModalLabel" >Add New Category</h6>
                                <!-- Close Button (Cross) in the upper-right corner -->
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="name" class="form-label text-primary">Category Name</label>
                                            <input type="text" id="name" name="category_name" class="form-control" placeholder="Enter Category Name" required>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-4">
                                        <button class="btn btn-primary btn-sm px-4" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
@endsection