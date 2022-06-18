@extends('admin.inc.master')
@section('title')
Add img
@endsection


@section('content')
    <div class="container-fluid">
        <div class="card card-body shadow">
            <h2>Add img</h2>
            <hr>
            <form method="POST" action="{{ url('store-list-img') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <input type="hidden" value="{{ $resturant->id }}" name="id" id="">
                    <div class="mt-2 mb-3 col-md-6">
                        <label for="">img</label><br>
                        <input type="file" name="img" id="" accept=".jpeg,.jpg,.png,.svg" required>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary mt-4">Add</button>
                        <a href="{{ url('/resturant-list-img',$resturant->id) }}" class="btn btn-secondary mt-4 ml-2">Back</a>
                    </div>

                </div>


            </form>
        </div>

    </div>
@endsection


