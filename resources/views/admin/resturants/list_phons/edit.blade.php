@extends('admin.inc.master')
@section('title')
    edit phone
@endsection


@section('content')
    <div class="container-fluid">
        <div class="card card-body shadow">
            <h2>edit phone</h2>
            <hr>




                <form class="row" method="POST" action="{{ url('update-list-phone') }}" enctype="multipart/form-data">
                    @csrf

                        <input type="hidden" value="{{ $resturant_list_phon->id }}" name="id" id="">
                        <div class="col-md-6 mt-2 mb-3">
                            <label for="">phone</label><br>
                            <input value="{{ $resturant_list_phon->phone }}" type="text" name="phone" id="" class="form-control" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <button class="btn btn-primary mt-4">Update</button>
                        </div>



                </form>

        </div>

    </div>
@endsection
