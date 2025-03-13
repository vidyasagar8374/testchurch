@extends('basedashboard')
@section('title', 'Enquiry')
@section('content')
<main id="main" class="main">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                    <h2>Enquiry</h2>
            </div>
            <div class="card-body">
              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th> <!-- Changed "mobile" to "Email" assuming it contains email -->
                          <th scope="col">Mobile</th> 
                          <th scope="col">Subject</th>
                          <th scope="col">Message</th>
                      </tr>
                  </thead>
                  <tbody>
                   
                      @if($enquirys->count() > 0) 
                          @foreach($enquirys as $contact)
                              <tr>
                                  <th scope="row">{{  $loop->iteration  }}</th> <!-- Using loop to display index -->
                                  <td>{{$contact->name}}</td>
                                  <td>{{$contact->email}}</td> <!-- Changed from "email" to "email" -->
                                  <td>{{$contact->mobile}}</td>
                                  <td>{{$contact->subject}} </td>
                                  <td> {{$contact->message}}</td>
                              </tr>
                              
                          @endforeach
                      @else
                          <tr>
                              <td colspan="4" class="text-center">No data found</td> <!-- colspan set to the number of columns in your table -->
                          </tr>
                      @endif
                  </tbody>
              </table>
              {{ $enquirys->links('pagination::bootstrap-5') }}
            </div>
        </div>

    </div>


</main><!-- End #main -->


@endsection