@extends('admin.inc.master')
@section('title')
Add phone
@endsection


@section('content')
    <div class="container-fluid">
        <div class="card card-body shadow">
            <h2>Add phone</h2>
            <hr>
            <form method="POST" action="{{ url('store-list-phone') }}">
                @csrf

                <div class="row">
                    <input type="hidden" name="id" value="{{ $resturant->id }}" id="">
                    <input type="hidden" value="{{ $resturant->id }}" name="id" id="">
                    <div class="mt-2 mb-3 col-md-6">
                        <label for="">phone</label><br>
                        <input type="text" class="form-control" name="phone" id="" required>
                    </div>
                    <div class="col-md-6 mt-3">
                        <button class="btn btn-primary mt-4">Add</button>
                        <a href="{{ url('/resturant-list-phons',$resturant->id) }}" class="btn btn-secondary mt-4 ml-2">Back</a>
                    </div>

                </div>


            </form>
        </div>

    </div>
@endsection


