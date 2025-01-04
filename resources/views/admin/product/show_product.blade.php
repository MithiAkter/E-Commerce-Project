@extends('admin.layout')
@section('admin_content')
    <!-- Required CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">
    <link href="{{ asset('backend/lib/summernote/summernote-bs4.css') }}" rel="stylesheet">

    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">E-Commerce</a>
        <span class="breadcrumb-item active">Product Section</span>
    </nav>
    
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <p class="mg-b-20 mg-sm-b-30">Product Details</p>
            
            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                            <br>
                            <strong>{{ $product->product_name }}</strong>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                            <br>
                            <strong>{{ $product->product_code }}</strong>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                            <br>
                            <strong>{{ $product->product_quantity }}</strong>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                          <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                            <br>
                            <strong>{{ $product->category_name }}</strong>
                        </div>
                      </div>
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                          <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                            <br>
                            <strong>{{ $product->subcategory_name }}</strong>
                        </div>
                      </div>

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                          <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                            <br>
                            <strong>{{ $product->brand_name }}</strong>
                            
                        </div>
                      </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                            <br>
                            <strong>{{ $product->product_size }}</strong>
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                            <br>
                            <strong>{{ $product->product_color }}</strong>
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                            <br>
                            <strong>{{ $product->selling_price }}</strong>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group" style="border:1px solid grey; padding: 10px;">
                            <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                            <br>
                            <strong>{!! $product->product_details !!}</strong>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <label>Image One (Main Thumbnail) <span class="tx-danger">*</span></label>
                        <div class="file-container">
                            <label class="custom-file">
                                
                            </label>
                            <img src="{{ URL::to($product->image_one) }}" id="one" style="height: 80px; width:100px;">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label>Image Two (Main Thumbnail) <span class="tx-danger">*</span></label>
                        <div class="file-container">
                            <label class="custom-file">
                                
                            </label>
                            <img src="{{ URL::to($product->image_two) }}" id="two" style="height: 80px; width:100px;">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label>Image Three (Main Thumbnail) <span class="tx-danger">*</span></label>
                        <div class="file-container">
                            <label class="custom-file">
                                
                            </label>
                            <img src="{{ URL::to($product->image_three) }}" id="three" style="height: 80px; width:100px;">
                        </div>
                    </div>
                </div>
                <br><hr>
                <div class="row">
                    <div class="col-lg-4">
                        <label>
                            @if($product->main_slider == 1)
                            <span class="badge badge-success">Active</span> |
                            @else
                            <span class="badge badge-danger">Inactive</span> |
                            @endif
                            <span>Main Slider</span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label>
                            @if($product->hot_deal == 1)
                            <span class="badge badge-success">Active</span> |
                            @else
                            <span class="badge badge-danger">Inactive</span> |
                            @endif
                            <span>Hot Deal</span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label>
                            @if($product->best_rated == 1)
                            <span class="badge badge-success">Active</span> |
                            @else
                            <span class="badge badge-danger">Inactive</span> |
                            @endif
                            <span>Best Rated</span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label>
                            @if($product->trend == 1)
                            <span class="badge badge-success">Active</span> |
                            @else
                            <span class="badge badge-danger">Inactive</span> |
                            @endif
                            <span>Trend Product</span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label>
                            @if($product->mid_slider == 1)
                            <span class="badge badge-success">Active</span> |
                            @else
                            <span class="badge badge-danger">Inactive</span> |
                            @endif
                            <span>Mid Slider</span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label>
                            @if($product->hot_new == 1)
                            <span class="badge badge-success">Active</span> |
                            @else
                            <span class="badge badge-danger">Inactive</span> |
                            @endif
                            <span>Hot New</span>
                        </label>
                    </div>
            </div><!-- form-layout -->
        </div><!-- card -->
    </div><!-- sl-pagebody -->
@endsection
