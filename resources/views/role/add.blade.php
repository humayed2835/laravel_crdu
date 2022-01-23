@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        role add form
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/role/add') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" name="role">
                                @error('role')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                               <button type="submit" class="btn btn-primary">add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8"></div>
        </div>
    </div>

@endsection