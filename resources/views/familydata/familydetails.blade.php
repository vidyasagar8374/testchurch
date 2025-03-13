@extends('basedashboard') @section('title', 'requestlist') @section('content')
<main id="main" class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
            <div class="family-details">
                            <h6>Header Id: {{ $userDetails->user_id }}</h6>
                            <h6>Header Name: {{ $userDetails->name }}</h6>
                            <h6>Header Email: {{ $userDetails->email }}</h6>
                         </div>


                <div id="massrequest-body" class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Family list</h5>
                        <!-- <a href="{{ route('addfamily') }}"><button type="button" class="btn btn-outline-primary">Add +</button></a> -->
                    </div>
                    <div class="card-body">
                        
                        <h5 class="card-title"></h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">email</th>
                                        <th scope="col">Relation</th>
                                        <th scope="col">DOB</th>
                                        <th scope="col">status</th>
                                        <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($familydetails as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->header_id }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->relation }}</td>
                                        <td>{{ $data->dob }}</td>
                                        @if($data->Status == 1)
                                        <td><span class="badge text-bg-success">{{$data->Status == 1 ? 'Active' : 'Inactive'}}</span></td>
                                        @else
                                        <td><span class="badge text-bg-danger">{{$data->Status == 1 ? 'Active' : 'Inactive'}}</span></td>
                                        @endif
                                        <td>
                                            <a href=""><i class="bi bi-eye-fill"></i></a>
                                            <a href=""><i class="bi bi-pencil-square"></i></a>
                                            <a href=""><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- End #main -->

@endsection
