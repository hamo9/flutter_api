@extends('admin.inc.master')
@section('title')
edit resturant
@endsection


@section('content')
    <div class="container-fluid">
        <div class="card card-body shadow">
            <h2>edit resturant</h2>
            <hr>
            <form method="POST" action="{{ url('update-resturant') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <input type="hidden" name="id" value="{{ $resturant->id }}" id="">
                    <div class="mt-2 mb-3 col-md-6">
                        <label for="">profile img</label><br>
                        <input type="file" name="profile_img" id="" accept=".jpeg,.jpg,.png,.svg" >
                    </div>
                    <div class="mt-2 mb-3 col-md-6">
                        <label for="">cover img</label><br>
                        <input type="file" name="cover_img" id="" accept=".jpeg,.jpg,.png,.svg" >
                    </div>

                    <div class="mt-2 col-md-6">
                        <label for="">name</label>
                        <input value="{{ $resturant->name }}" type="text" name="name" id="" class="form-control" required >
                    </div>

                    <div class="mt-2 col-md-6">
                        <label for="">title</label>
                        <input value="{{ $resturant->title }}" type="text" name="title" id="" class="form-control" required >
                    </div>

                    <div class="mt-2 col-md-6">
                        <label for="">location</label>
                        <input value="{{ $resturant->location }}" type="text" name="location" id="" class="form-control" required >
                    </div>

                    <div class="mt-2 col-md-6">
                        <label for="">facebook</label>
                        <input value="{{ $resturant->facebook }}" type="text" name="facebook" id="" class="form-control" required >
                    </div>

                    <div class="mt-2 col-md-6">
                        <label for="">category</label>
                        <select name="id_category" id="" class="form-control">
                            @foreach ($categories as $item )
                                <option @if($resturant->id_category == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <button class="btn btn-primary mt-4">Update</button>
                <a href="{{ url('/resturants') }}" class="btn btn-secondary mt-4 ml-2">Back</a>
            </form>
        </div>

    </div>
@endsection


