@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2 ">
            <div class="card mt-5">
                <div class="card-header">
                    Change admin email
                </div>
                <div class="card-body">
                    <form action="/admin/email" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" name="email" type="text" id="email" value="{{ $admin->email }}">
                        </div>
                        <button class="btn btn-primary">Change</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
