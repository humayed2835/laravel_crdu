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
 
                         <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                             @csrf
                            
                             <div class="mb-4">
                                 <label class="form-label text-uppercase">Banner title</label>
                                 <input type="text" class="form-control" name="banner_title" value="">
                                 @error('banner_title')
                                     <small class="text-danger">{{ $message }}</small>
                                 @enderror
                             </div>

                             <div class="mb-4">
                                 <label class="form-label text-uppercase">Banner Name</label>
                                 <input type="text" class="form-control" name="banner_name">
                                 @error('banner_name')
                                     <small class="text-danger">{{ $message }}</small>
                                 @enderror
                             </div>

                             <div class="mb-4">
                                 <label class="form-label text-uppercase">Banner Image</label>
                                 <input type="file" class="form-control" name="banner_image">
                                 @error('banner_image')
                                     <small class="text-danger">{{ $message }}</small>
                                 @enderror
                                 <small class="text-primary d-block mt-2">Banner Image dimenion : w -270 h-310 px</small>
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

