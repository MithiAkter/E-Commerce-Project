@extends('admin.layout')
@section('admin_content')
    <!-- Required CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">
    <link href="{{ asset('backend/lib/summernote/summernote-bs4.css') }}" rel="stylesheet">

    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Product Section</span>
    </nav>
    
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">New Product Add <a href="#" class="btn btn-success btn-sm pull-right">All Product</a></h6>
            <p class="mg-b-20 mg-sm-b-30">New product add form</p>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_name">
                        </div>
                    </div>

                    

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_code">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="quantity">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                          <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                          <select class="form-control select2" data-placeholder="Choose Brand" name="category_id">
                            <option label="Choose country"></option>
                            @foreach ($category as $row)
                                <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                            @endforeach
                            
                          </select>
                        </div>
                      </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="subcategory_id">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                          <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                          <select class="form-control select2" data-placeholder="Choose Brand" name="brand_id">
                            <option label="Choose Brand"></option>
                            @foreach ($brand as $br)
                                {{-- <option value="{  { $br->id }}" img src="{{ URL::to(br->brand_logo) }}" style="height:30px; width:30px;">{{ $br->brand_name }}</option>               --}}
                            @endforeach

                          </select>
                        </div>
                      </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_size" id="size" data-role="tagsinput">
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label><br>
                            <input class="form-control lg-4" type="text" name="product_color" id="color" data-role="tagsinput">
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label><br>
                            <input class="form-control" type="text" name="selling_price" placeholder="Enter selling price">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                            <input class="form-control" id="summernote" name="product_details">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                            <input class="form-control" placeholder="video link" name="video_link">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <label>Image One (Main Thumbnail) <span class="tx-danger">*</span></label>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="image_one">
                            <span class="custom-file-control"></span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label>Image Two (Main Thumbnail) <span class="tx-danger">*</span></label>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="image_two">
                            <span class="custom-file-control"></span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label>Image Three (Main Thumbnail) <span class="tx-danger">*</span></label>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="image_three">
                            <span class="custom-file-control"></span>
                        </label>
                    </div>
                </div><!-- row -->
                <br><hr>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="main_slider" value="1">
                            <span>Main Slider</span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="hot_deal" value="1">
                            <span>Hot Deal</span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="best_rated" value="1">
                            <span>Best Rated</span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="trend" value="1">
                            <span>Trend Product</span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="mid_slider" value="1">
                            <span>Mid Slider</span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="hot_slider" value="1">
                            <span>Hot New</span>
                        </label>
                    </div>

                <!-- Form Footer -->
                <div class="form-layout-footer">
                    <button class="btn btn-info mg-r-5">Submit Form</button>
                    <button class="btn btn-secondary">Cancel</button>
                </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
        </div><!-- card -->
    </div><!-- sl-pagebody -->

    <!-- Required JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>
    
        {{-- summernote --}}
        <script>
            $(function(){
              'use strict';
      
              //Inline editor
              var editor = new MediumEditor('.editable');
      
              $('#summernote').summernote({
                height: 150,
                tooltip: false
                })
              });
              </script>

    <!-- TagsInput Initialization -->
    <script>
        $(document).ready(function () {
            console.log('TagsInput Plugin:', $('#size').tagsinput); // Check plugin
            $('#size').tagsinput();
        });
    </script>
@endsection
