@extends('admin.layout')
@section('admin_content')
<div class="sl-pagebody">

    <div class="sl-page-title">
        <h5>Product Table</h5>
    </div>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">
            Product List
        </h6>
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-15p">Product ID</th>
                        <th class="wd-15p">Product Name</th>
                        <th class="wd-15p">Image</th>
                        <th class="wd-13p">Category</th>
                        <th class="wd-15p">Brand</th>
                        <th class="wd-10p">Quantity</th>
                        <th class="wd-12p">Status</th>
                        <th class="wd-30p">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $row)
                    <tr>
                        <td>{{ $row->product_code }}</td>
                        <td>{{ $row->brand_name }}</td>
                        <td><img src="{{ URL::to($row->image_one) }}" alt="brand img" height="60px;" width="80px;"></td>
                        <td>{{ $row->category_name }}</td>
                        <td>{{ $row->brand_name }}</td>
                        <td>{{ $row->product_quantity }}</td>
                        <td>
                            @if($row->status == 1)
                            <span class="badge badge-success" style="padding: 7px;">Active</span>
                            @else
                            <span class="badge badge-danger" style="padding: 7px;">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('product.edit', $row->id) }}" class="btn btn-info btn-sm" style="width:60px; padding:5px; border-radius: 5px;"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('product.destroy', $row->id) }}" id="delete" class="btn btn-danger btn-sm" style="width:60px; padding:5px; border-radius: 5px;">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="{{ route('product.view', $row->id) }}" class="btn btn-warning btn-sm" style="width:60px; padding:5px; border-radius: 5px;"><i class="fa fa-eye"></i></a>
                            @if($row->status == 1)
                                <a href="{{ route('inactive.product', $row->id) }}" class="btn btn-sm" style="width:60px; padding:5px; border-radius: 5px; border: 2px solid #bbc4c2;"><i class="fa fa-check-circle" style="color: #28a745" title="Inactive"></i></a>
                            @else
                                <a href="{{ route('active.product', $row->id) }}" class="btn btn-sm" style="width:60px; padding:5px; border-radius: 5px; border: 2px solid #bbc4c2;"><i class="fa fa-check-circle" style="color: #EE4B2B;;" title="Active"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection