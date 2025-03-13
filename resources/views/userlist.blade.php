@extends('basedashboard')
@section('title', 'Userlist')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
</div><!-- End Page Title -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                    <h2>Users</h2>
            </div>
            <div class="card-body">
              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th> <!-- Changed "mobile" to "Email" assuming it contains email -->
                          <th scope="col">Status</th>
                          <th scope="col">Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                   
                      @if($users->count() > 0) 
                          @foreach($users as $user)
                              <tr>
                                  <th scope="row">{{  $loop->iteration  }}</th> <!-- Using loop to display index -->
                                  <td>{{$user->name}}</td>
                                  <td>{{$user->email}}</td> <!-- Changed from "email" to "email" -->
                                  <td>
                                  <span class="badge text-bg-success">{{$user->Active == 1 ? 'Active' : 'Inactive'}}</span>
                                  </td>
                                  <td>
                                  <a href="{{ url('/edituser/' . $user->user_id) }}"><i class="bi bi-eye-fill"></i></a>
                                  <a href=""><i class="bi bi-pencil-square"></i></a>
                                  <a href=""><i class="bi bi-trash"></i></a>
                                  </td>
                              </tr>
                              
                          @endforeach
                      @else
                          <tr>
                              <td colspan="4" class="text-center">No data found</td> <!-- colspan set to the number of columns in your table -->
                          </tr>
                      @endif
                  </tbody>
              </table>
              {{ $users->links('pagination::bootstrap-5') }}
            </div>
        </div>

    </div>


</main><!-- End #main -->


@endsection