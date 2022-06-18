@extends('admin.inc.master')
@section('title')
 resturant list phons
@endsection

@section('style')
<link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->


            <a href="{{ url('add-list-phone',$resturant->id) }}" class="btn btn-dark mb-2">add phone</a>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">list phons for [ <span class="text-danger">{{ $resturant->name }}</span> ]</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>phone</th>
                                <th>manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $number = 0;
                            @endphp
                            @foreach ($resturant_list_phons as $item )
                                <tr>
                                    <td>{{ ++$number }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        <a href="{{ url('edit-list-phone', $item->id) }}" class="m-1 btn btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="{{ url('delete-list-phone', $item->id) }}" class="m-1 btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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

