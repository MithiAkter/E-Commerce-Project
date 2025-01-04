@extends('admin.layout')
@section('admin_content')
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Subscriber Table</h5>
        </div>
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Subscriber List
          <a href="#" class="btn btn-danger btn-sm " style="float:right; border-radius: 5px; width: 100px; padding:5px;" id="delete">All Delete</a>
          </h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">SN</th>
                  <th class="wd-15p">Email</th>
                  <th class="wd-15p">Subscribing Time</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($sub as $row)
                <tr>
                  <td><input type="checkbox"> {{ $row->id }}</td>
                  <td>{{( $row->email )}}</td>
                  <td>{{ \Carbon\Carbon::Parse($row->created_at)->diffForhumans() }}</td>
                  <td>
                    <a href="{{ route('newsletter.destroy', $row->id) }}" id="delete" class="btn btn-danger btn-sm" style="width: 80px; padding:5px; border-radius: 5px;">
                      Delete
                    </a>
                  </td>
                </tr>
                @endforeach           
              </tbody>
            </table>
          </div>
        </div>
@endsection