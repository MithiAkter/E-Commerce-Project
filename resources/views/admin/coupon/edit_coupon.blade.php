@extends('admin.layout')
@section('admin_content')
  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Coupon Update</h5>
    </div>
    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Coupon Update</h6>
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
      <form action="{{ route('coupon.update', $coupon->id) }}" method="post">
      @csrf
      <div class="modal-body pd-20">
       <div class="form-group">
         <label for="exampleInputCoupon">Coupon Code</label>
          <input type="text" class="form-control" name="coupon" id="exampleInputEmail1" aria-describedby="emailHelp" 
          value="{{( $coupon->coupon )}}" >
       </div>
       <div class="form-group">
         <label for="exampleInputCoupon">Coupon Discount (%)</label>
          <input type="text" class="form-control" name="discount" id="exampleInputEmail1" aria-describedby="emailHelp" 
          value="{{( $coupon->discount )}}" >
       </div>
     </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info pd-x-20">Update</button>
        </div>
      </form>
    </div>
  </div>

@endsection