@extends('dashboard.dashboard_master')

@section('content')

        <div class="row">
            
            <div class="col-lg-12 m-auto">
            <div class="card">
                    <div class="card-header">
                       Category add form
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered">
                          <thead>
                              <th>Serial</th>
                              <th>Product Name</th>
                              <th>Old Price</th>
                              <th>New Price</th> 
                              <th>Product Image</th> 
                              <th>Created at</th> 
                              <th>Action</th>
                          </thead>
                          <tbody>
                              @forelse($all_products as $products)
                                <tr> 
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $products->product_name }}</td>
                                    <td>{{ $products->old_price }}</td>
                                    <td>{{ $products->new_price }}</td>
                                    <td>
                                        <img src="{{ asset('Uploads/product_photo') }}/{{ $products->product_image }}" alt="Not Found" width="100">
                                    </td>
                                    <td>{{ $products->created_at->format('d-M-Y') }}</td>  
                                    <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('product.edit', $products->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('product.delete', $products->id) }}" class="btn btn-danger btn-sm">Delete</a>
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