@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   <table class="table table-bordered">
                       <thead>
                           <th>serial</th>
                           <th>User Name</th>
                           <th>User email</th>
                           <th>Action</th>
                       </thead>
                       <tbody>
                           @foreach($all_users as $user)
                          <tr>
                            <td>{{ $loop->index + 1}}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}}</td>
                            <td>-</td>
                          </tr>
                          @endforeach
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
