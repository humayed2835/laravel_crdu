@extends('dashboard.dashboard_master')

@section('content')

        <div class="row">
            
            <div class="col-lg-8 m-auto">
            <div class="card">
                    <div class="card-header">
                       Category add form
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered">
                          <thead>
                              <th>Serial</th>
                              <th>Category Name</th>
                              <th>Status</th>
                              <th>Created at</th> 
                              <th>Added By</th> 
                              <th>Action</th>
                          </thead>
                          <tbody>
                              @forelse($all_categorys as $categorys)
                                <tr> 
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $categorys->category_name }}</td>
                                    <td>
                                        @if($categorys->status == 1)
                                            <span class="badge bg-success">active</span>
                                            @else
                                            <span class="badge bg-danger">Deactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $categorys->created_at->format('d-M-Y') }}</td>  
                                    <td>{{ $categorys->relationToUser->name }}</td>
                                    <!-- diffForHumans() -->
                                    <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ url('/category/edit') }}/{{ $categorys->id }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ url('/category/delete') }}/{{ $categorys->id }}" class="btn btn-danger btn-sm">Delete</a>
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

@endsection