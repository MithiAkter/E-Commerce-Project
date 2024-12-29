@extends('admin.layout')
@section('admin_content')
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Coupon Table</h5>
        </div>
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Coupon List
             <a href="#" class="btn btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add Coupon</a>
          </h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">SN</th>
                  <th class="wd-15p">Coupon Code</th>
                  <th class="wd-15p">Coupon Percentage</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                @php($serial = 1)

                @foreach($coupon as $row)
                <tr>
                  <td>{{$serial++}}</td>
                  <td>{{( $row->coupon )}}</td>
                  <td>{{( $row->discount )}}%</td>
                  <td>
                    <a href="{{ route('coupon.edit', $row->id) }}" class="btn btn-info btn-sm" style="width: 80px; padding:5px; border-radius: 5px;">Edit</a>
                    <a href="#" id="delete" class="btn btn-danger btn-sm" style="width: 80px; padding:5px; border-radius: 5px;">
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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">************************* Coupon Add *************************</h6>
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
             <form action="{{route('coupon.store')}}" method="post">
             @csrf
             <div class="modal-body pd-20">

             <div class="form-group">
               <label for="exampleInputCategory">Coupon Code</label>
                <input type="text" class="form-control" name="coupon" id="exampleInputEmail1" aria-describedby="emailHelp" 
                placeholder="Coupon Code" required>
             </div>

             <div class="form-group">
               <label for="exampleInputCategory">Coupon Discount (%)</label>
                <input type="text" class="form-control" name="discount" id="exampleInputEmail1" aria-describedby="emailHelp" 
                placeholder="Coupon Discount" required>
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