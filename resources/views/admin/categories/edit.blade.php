@extends('admin.inc.master')

@section('title')
    edit category
@endsection


@section('content')
    <div class="container-fluid">
        <div class="card card-body shadow">
            <h2>edit category</h2>
            <hr>
            <div class="row">
                <div class="col-md-6 text-center">
                    <img src="{{ $category->img }}" alt="" width="300px" height="300px" class="m-auto rounded-pill">
                </div>
                <form class="col-md-6" method="POST" action="{{ url('update-category') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" value="{{ $category->id }}" name="id" id="">
                        <div class="mt-2 mb-3">
                            <label for="">img</label><br>
                            <input type="file" name="img" id="" accept=".jpeg,.jpg,.png,.svg">
                        </div>

                        <div class="mt-2">
                            <label for="">name</label>
                            <input value="{{ $category->name }}" type="text" name="name" id="" class="form-control" required>
                        </div>

                    <button class="btn btn-primary mt-4">Update</button>
                </form>
            </div>

        </div>

    </div>
@endsection


