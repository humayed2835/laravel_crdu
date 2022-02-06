@extends('dashboard.dashboard_master')
 
 @section('content')
 
         <div class="row">
             <div class="col-lg-8 m-auto">
                 <div class="card">
                     <div class="card-header">
                         Category add form
                     </div>
                     <div class="card-body">
 
                         @if(session('insDone'))
                         <div class="alert alert-success alert-dismissible fade show" role="alert">
                             <strong>{{ session('insDone') }}</strong>
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                         @endif
 
                         <form action="{{ route('subcategory.store') }}" method="post">
                             @csrf
                            <!-- sub-category -->
                            <div class="mb-4">
                                <select class="form-select" name="category_id">
                                    <option value="">Select a category</option>
                                    @foreach($all_categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                     <small class="text-danger">{{ $message }}</small>
                                 @enderror
                            </div>
                            <!-- sub-category -->
                            
                             <div class="mb-4">
                                 <input type="text" class="form-control" name="subcategory_name" placeholder="Enter Sub Category Name">
                                 @error('subcategory_name')
                                     <small class="text-danger">{{ $message }}</small>
                                 @enderror
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