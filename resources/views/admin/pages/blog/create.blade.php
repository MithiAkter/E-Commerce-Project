@extends('admin.layout')
@section('admin_content')
    <!-- Required CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">
    <link href="{{ asset('backend/lib/summernote/summernote-bs4.css') }}" rel="stylesheet">

    <style>
        .file-container {
            display: flex;
            align-items: center;
        }

        .custom-file {
            flex-grow: 1;
        }

        .image_preview {
            display: none; 
            margin-left: 10px;
            max-width: 100px;
            max-height: 80px;
        }
    </style>
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Post Section</span>
    </nav>
    
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">New Post Add form <a href="{{ route('all.blogpost') }}" class="btn btn-success btn-sm pull-right">All Post</a></h6>
            <form action="{{ route('store.blogpost') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Post Title (ENGLISH) <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="post_title_en">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Post Title (BANGLA) <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="post_title_bn">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group mg-b-10-force">
                          <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                          <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                            <option label="Choose Category"></option>
                            @foreach ($category as $row)
                                <option value="{{ $row->id }}">{{ $row->category_name_en }}</option>
                            @endforeach
                            
                          </select>
                        </div>
                      </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Product Details (English) <span class="tx-danger">*</span></label>
                            <textarea class="form-control" id="summernote" name="details_en" required>

                            </textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Product Details (Bangla) <span class="tx-danger">*</span></label>
                            <textarea class="form-control" id="summernote1" name="details_bn" required>

                            </textarea>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <label>Image One (Main Thumbnail) <span class="tx-danger">*</span></label>
                        <div class="file-container">
                            <label class="custom-file">
                                <input type="file" id="file" class="custom-file-input" name="post_image" onchange="readURL(this);">
                                <span class="custom-file-control"></span>
                            </label>
                            <img src="#" id="one" class="image_preview">
                            
                        </div>
                        <div class="form-layout-footer mg-t-30">
                            <button class="btn btn-info mg-r-5">Submit Form</button>
                            <button class="btn btn-secondary">Cancel</button>
                        </div><!-- form-layout-footer -->
                    </div>
                
            </div><!-- form-layout -->
        </form>
        </div><!-- card -->
    </div><!-- sl-pagebody -->
    {{-- summernote --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
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
    <script>
        $(function(){
          'use strict';
  
          //Inline editor
          var editor = new MediumEditor('.editable');
  
          $('#summernote1').summernote({
            height: 150,
            tooltip: false
            })
          });
          </script>


        <script type="text/javascript">
           function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#one')
                .attr('src', e.target.result)  // Set the image source
                .show(); // Show the image after selection
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        $('#one').hide(); // Hide the preview if no file is selected
    }
}    
        </script>

@endsection
