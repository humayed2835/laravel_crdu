@extends('dashboard.dashboard_master')

@section('content')

        <div class="row">
            
            <div class="col-lg-12 m-auto">
            <div class="card">
                    <div class="card-header">
                       Sub Category list
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered">
                          <thead>
                              <th>Serial</th>
                              <th>Category Name</th>
                              <th>Subcategory Name</th>
                              <th>Created at</th> 
                              <th>Action</th>
                          </thead>
                          <tbody>
                              @forelse($all_subcategories as $subcategories)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $subcategories->relationTocategories->category_name }}</td>
                                    <td>{{ $subcategories->subcategory_name }}</td>
                                    <td>{{ $subcategories->created_at->format('d-M-Y') }}</td>  
                                    <!-- diffForHumans() -->
                                    <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ url('/subcategory/edit') }}/{{ $subcategories->id }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ url('/subcategory/delete') }}/{{ $subcategories->id }}" class="btn btn-danger btn-sm">Delete</a>
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