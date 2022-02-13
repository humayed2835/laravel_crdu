@extends('dashboard.dashboard_master')
 
 @section('content')
 
         <div class="row">
             <div class="col-lg-8 m-auto">
                 <div class="card">
                     <div class="card-header">
                         Product add form
                     </div>
                     <div class="card-body">
 
                         @if(session('insDone'))
                         <div class="alert alert-success alert-dismissible fade show" role="alert">
                             <strong>{{ session('insDone') }}</strong>
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                         @endif
 
                         <form action="{{ route('product.update') }}" method="post" enctype="multipart/form-data">
                             @csrf
                            
                             <div class="mb-4">
                                 <label class="form-label text-uppercase">Product name</label>
                                 <input type="hidden" name="id" value="{{ $product_info->id }}">
                                 <input type="text" class="form-control" name="product_name" value="{{ $product_info->product_name }}">
                                 @error('product_name')
                                     <small class="text-danger">{{ $message }}</small>
                                 @enderror
                             </div>

                             <div class="mb-4">
                                 <label class="form-label text-uppercase">Old Price</label>
                                 <input type="text" class="form-control" name="old_price" value="{{ $product_info->old_price }}">
                                 @error('old_price')
                                     <small class="text-danger">{{ $message }}</small>
                                 @enderror
                             </div>

                             <div class="mb-4">
                                 <label class="form-label text-uppercase">New price</label>
                                 <input type="text" class="form-control" name="new_price" value="{{ $product_info->new_price }}">
                                 @error('new_price')
                                     <small class="text-danger">{{ $message }}</small>
                                 @enderror
                             </div>

                             <div class="mb-4">
                                 <label class="form-label text-uppercase">Product Image</label>
                                 <input type="file" class="form-control" name="product_image">
                                 @error('product_image')
                                     <small class="text-danger">{{ $message }}</small>
                                 @enderror
                                 <small class="text-primary d-block mt-2">Product Image dimenion : w -270 h-310 px</small>
                             </div>
                             <div class="mb-3">
                                 <img src="{{ asset('Uploads/product_photo') }}/{{ $product_info->product_image }}" alt="" width="100">
                             </div>

                             <div class="mb-4">
                                <button type="submit" class="btn btn-info">Edit</button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
             
         </div>
 
 
 @endsection