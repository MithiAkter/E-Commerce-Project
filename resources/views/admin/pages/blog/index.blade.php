@extends('admin.layout')
@section('admin_content')
<div class="sl-pagebody">

    <div class="sl-page-title">
        <h5>Post Table</h5>
    </div>

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">
            Post List
        </h6>
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-15p">Post Title</th>
                        <th class="wd-13p">Category</th>
                        <th class="wd-15p">Image</th>
                        <th class="wd-30p">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($post as $row)
                    <tr>
                        <td>{{ $row->post_title_en }}</td>
                        <td>{{ $row->category_name_en }}</td>
                        <td><img src="{{ URL::to($row->post_image) }}" alt="blog img" height="60px;" width="80px;"></td>
                        <td>
                            <a href="{{ route('blogpost.edit', $row->id) }}" class="btn btn-info btn-sm" style="width:60px; padding:5px; border-radius: 5px;"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('blogpost.destroy', $row->id) }}" id="delete" class="btn btn-danger btn-sm" style="width:60px; padding:5px; border-radius: 5px;">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection