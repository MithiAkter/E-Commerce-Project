@extends('admin.layout')
@section('admin_content')
  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Brand Update</h5>
    </div>
    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Brand Update</h6>
    <div class="table-wrapper">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <form action="{{ route('brand.update', $brand->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="modal-body pd-20">
       <div class="form-group">
         <label for="exampleInputBrand">Brand Name</label>
          <input type="text" class="form-control" name="brand_name" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{( $brand->brand_name )}}" required>
       </div>
       <div class="form-group">
         <label for="exampleInputBrand">Brand Logo</label>
          <input type="file" class="form-control" name="brand_logo" id="exampleInputEmail1" aria-describedby="emailHelp" >
       </div>
       <div class="form-group">
         <label for="exampleInputBrand">Old Logo</label>
          <img src="{{ URL::to($brand->brand_logo) }}" alt="brand logo" height="80px;" width="100px;">
          <input type="hidden" name= "old_logo" value = "{{ $brand->brand_logo }}" >
       </div>
     </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info pd-x-20">Update</button>
        </div>
      </form>
    </div>
  </div>

@endsection