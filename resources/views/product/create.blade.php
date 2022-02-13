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
 
                         <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                             @csrf
                            
                             <div class="mb-4">
                                 <label class="form-label text-uppercase">Product name</label>
                                 <input type="text" class="form-control" name="product_name">
                                 @error('product_name')
                                     <small class="text-danger">{{ $message }}</small>
                                 @enderror
                             </div>

                             <div class="mb-4">
                                 <label class="form-label text-uppercase">Old Price</label>
                                 <input type="text" class="form-control" name="old_price">
                                 @error('old_price')
                                     <small class="text-danger">{{ $message }}</small>
                                 @enderror
                             </div>

                             <div class="mb-4">
                                 <label class="form-label text-uppercase">New price</label>
                                 <input type="text" class="form-control" name="new_price">
                                 @error('new_price')
                                     <small class="text-danger">{{ $message }}</small>
                                 @enderror
                             </div>

                             <div class="mb-4">
                                 <label class="form-label text-uppercase">Category</label>
                                 <select name="category_id" class="custom-select" id="catId">
                                     <option value="" >Select a Category</option>
                                     @foreach($all_catecories as $categorys)
                                     <option value="{{ $categorys->id }}" >{{ $categorys->category_name }}</option>
                                     @endforeach
                                 </select>
                                 @error('category_id')
                                     <small class="text-danger">{{ $message }}</small>
                                 @enderror
                             </div> 

                             <div class="mb-4">
                                 <label class="form-label text-uppercase">Sub Category</label>
                                 <select name="sub_category_id" class="custom-select">
                                     <option value="" >Select a Sub Category</option>
                                     @foreach($all_sub_catecories as $subcategorys)
                                     <option value="{{ $subcategorys->id }}" >{{ $subcategorys->subcategory_name }}</option>
                                     @endforeach
                                 </select>
                                 @error('sub_category_id')
                                     <small class="text-danger">{{ $message }}</small>
                                 @enderror
                             </div>

                             <div class="mb-4">
                                 <label class="form-label text-uppercase">Short Description</label>
                                 <textarea name="short_description" class="form-control"></textarea>
                                 @error('short_description')
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

                             <div class="mb-4">
                                <button type="submit" class="btn btn-primary">add</button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
             
         </div>
 
         
 @endsection

 @section('footer_script')
        <script>
             $(document).ready(function() {
                $('#catId').select2();
            });
        </script>
 @endsection