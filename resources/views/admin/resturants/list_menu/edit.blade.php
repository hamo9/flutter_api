@extends('admin.inc.master')
@section('title')
    edit menu
@endsection


@section('content')
    <div class="container-fluid">
        <div class="card card-body shadow">
            <h2>edit menu</h2>
            <hr>
            <div class="row">
                <div class="col-md-6 text-center">
                    <img src="{{ $resturant_list_menu->menu_img }}" width="300px" height="300px" class="m-auto" alt="">
                </div>


                <form class="col-md-6" method="POST" action="{{ url('update-list-menu') }}" enctype="multipart/form-data">
                    @csrf

                        <input type="hidden" value="{{ $resturant_list_menu->id }}" name="id" id="">
                        <div class="mt-2 mb-3">
                            <label for="">menu</label><br>
                            <input type="file" name="img" id="" accept=".jpeg,.jpg,.png,.svg" required>
                        </div>
                        <div class="">
                            <button class="btn btn-primary mt-4">Update</button>
                        </div>



                </form>

            </div>
        </div>

    </div>
@endsection
