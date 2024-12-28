@extends('admin.layout')
@section('admin_content')
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Brand Table</h5>
        </div>
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Brand List
             <a href="#" class="btn btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add Brand</a>
          </h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Brand Name</th>
                  <th class="wd-15p">Brand Logo</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($brand as $row)
                <tr>
                  <td>{{( $row->id )}}</td>
                  <td>{{( $row->brand_name )}}</td>
                  <td><img src="{{ URL::to($row->brand_logo) }}" alt="brand img" height="80px;" width="100px;"></td>
                  <td>
                    <a href="{{ route('brand.edit', $row->id) }}" class="btn btn-info btn-sm" style="width: 80px; padding:5px; border-radius: 5px;">Edit</a>
                    <a href="{{ route('brand.destroy', $row->id) }}" id="delete" class="btn btn-danger btn-sm" style="width: 80px; padding:5px; border-radius: 5px;">
                      Delete
                    </a>
                  </td>
                </tr>
                @endforeach           
              </tbody>
            </table>
          </div>
        </div>
        <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">************************* Brand Add *************************</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @if ($errors->any())
               <div class="alert alert-danger">
                  <ul>
                   @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                   @endforeach
                  </ul>
                </div>
              @endif
             <form action="{{route('brand.store')}}" method="post" enctype="multipart/form-data">
             @csrf
             <div class="modal-body pd-20">

             <div class="form-group">
               <label for="exampleInputBrand">Brand Name</label>
                <input type="text" class="form-control" name="brand_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Brand Name">
             </div>

             <div class="form-group">
               <label for="exampleInputBrand">Brand Logo</label>
                <input type="file" class="form-control" name="brand_logo" aria-describedby="emailHelp" placeholder="Brand Name">
             </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
             </form>
            </div>
          </div>
        </div>

@endsection