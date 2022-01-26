@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            
            <div class="col-lg-8">
            <div class="card">
                    <div class="card-header">
                        role add form
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered table-responsive">
                          <thead>
                              <th>Serial</th>
                              <th>Role</th>
                              <th>Status</th>
                              <th>Created at</th> 
                              <th>Action</th>
                          </thead>
                          <tbody>
                              @forelse($all_role as $role)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $role->role }}</td>
                                    <td>{{ $role->status }}</td>
                                    <td>{{ $role->created_at->format('d-M-Y') }}</td>  
                                    <!-- diffForHumans() -->
                                    <td>-</td>
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