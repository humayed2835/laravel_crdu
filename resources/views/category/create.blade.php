@extends('dashboard.dashboard_master')
 
@section('content')

        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        Category add form
                    </div>
                    <div class="card-body">

                        @if(session('insErr'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ session('insErr') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif


                        @if(session('insDone'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('insDone') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <form action="{{ url('/category/store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" name="category_name" placeholder="Enter Category Name">
                                @error('category_name')
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
            
        </div>


@endsection