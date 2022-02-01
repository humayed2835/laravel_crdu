@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            
            <div class="col-lg-8 m-auto">
            <div class="card">
                    <div class="card-header">
                        role add form
                    </div>
                    <div class="card-body">
                    @if(session('delDone'))

                    <div class="alert alert-danger" role="alert">
                    {{ session('delDone') }}
                    </div>

                    @endif


                      <table class="table table-bordered table-responsive">
                          <thead>
                              <th>Serial</th>
                              <th>Category Name</th>
                              <th>Action</th>
                          </thead>
                          <tbody>
                              @forelse($all_trashed as $trashed_category)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $trashed_category->category_name }}</td>
                                    <!-- diffForHumans() -->
                                    <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ url('/category/restore') }}/{{ $trashed_category->id }}" class="btn btn-primary btn-sm">Restore</a>

                                        <a href="{{ url('/category/vanish') }}/{{ $trashed_category->id }} " class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                    </td>
                                </tr>
                                @empty 
                                <tr>
                                    <td class="text-danger text-center" colspan="10">No data added yet!</td>
                                </tr>
                              @endforelse
                          </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection