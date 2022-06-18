@extends('admin.inc.master')
@section('title')
 resturant list menu
@endsection

@section('style')
<link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->


            <a href="{{ url('add-list-menu',$resturant->id) }}" class="btn btn-dark mb-2">add menu</a>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">list menu for [ <span class="text-danger">{{ $resturant->name }}</span> ]</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>menu</th>
                                <th>manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $number = 0;
                            @endphp
                            @foreach ($data as $item )
                                <tr>
                                    <td>{{ ++$number }}</td>
                                    <td>
                                        <img src="{{ $item->menu_img }}" width="100px" height="100px" class="rounded-pill" alt="">
                                    </td>
                                    <td>
                                        <a href="{{ url('edit-list-menu', $item->id) }}" class="m-1 btn btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="{{ url('delete-list-menu', $item->id) }}" class="m-1 btn btn-danger"><i class="fas fa-trash-alt"></i></a>

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

