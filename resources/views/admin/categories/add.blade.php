@extends('admin.inc.master')
@section('title')
Add category
@endsection


@section('content')
    <div class="container-fluid">
        <div class="card card-body shadow">
            <h2>Add category</h2>
            <hr>
            <form method="POST" action="{{ url('store-category') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="mt-2 mb-3 col-md-6">
                        <label for="">img</label><br>
                        <input type="file" name="img" id="" accept=".jpeg,.jpg,.png,.svg" required>
                    </div>

                    <div class="mt-2 col-md-6">
                        <label for="">name</label>
                        <input type="text" name="name" id="" class="form-control" required >
                    </div>

                </div>
                <button class="btn btn-primary mt-4">Add</button>
                <a href="{{ url('/category') }}" class="btn btn-secondary mt-4 ml-2">Back</a>
            </form>
        </div>

    </div>
@endsection


