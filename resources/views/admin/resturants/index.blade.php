@extends('admin.inc.master')
@section('title')
 resturants
@endsection

@section('style')
<link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->


            <a href="{{ url('add-resturant') }}" class="btn btn-dark mb-2">Add resturant</a>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All resturants</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>profile img</th>
                                <th>cover img</th>
                                <th>name</th>
                                <th>title</th>
                                <th>location</th>
                                <th>category</th>
                                <th>facebook</th>
                                <th>list img</th>
                                <th>list phons</th>
                                <th>list menu</th>
                                <th>manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resturants as $item )
                                <tr>
                                    <td>
                                        <img src="{{ $item->profile_img }}" width="100px" height="100px" class="rounded-pill" alt="">
                                    </td>
                                    <td>
                                        <img src="{{ $item->cover_img }}" width="100px" height="100px" class="rounded-pill" alt="">
                                    </td>
                                    <td>{{ $item->name}}</td>
                                    <td>{{ $item->title}}</td>
                                    <td>{{ $item->location}}</td>
                                    <td>{{ $item->category->name}}</td>
                                    <td>{{ $item->facebook }}</td>
                                    <td>
                                        <a href="{{ url('/resturant-list-img', $item->id) }}" class="btn btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ url('/resturant-list-phons', $item->id) }}" class="btn btn-dark">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ url('/resturant-list-menu', $item->id) }}" class="btn btn-secondary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>

                                    <td>
                                        <a href="{{ url('edit-resturant', $item->id) }}" class="m-1 btn btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="{{ url('delete-resturant', $item->id) }}" class="m-1 btn btn-danger"><i class="fas fa-trash-alt"></i></a>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
 <!-- Page level plugins -->
 <script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="admin/js/demo/datatables-demo.js"></script>
@endsection

