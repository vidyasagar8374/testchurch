@extends('basedashboard') @section('title', 'requestlist') @section('content')
<main id="main" class="main">
    <!-- End Page Title -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div id="massrequest-body" class="card">
                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                        <h5 class="mb-0">Request List</h5>
                        <div class="addbutton">
                            <a href="{{ route('addmassrequest') }}">
                                <button type="button" class="btn btn-outline-primary">Add +</button>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Short Code</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">order</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $post->RequestList }}</td>
                                        <td>{{ $post->short_code }}</td>
                                        @if($post->status == 1)
                                        <td><span class="badge text-bg-success">{{$post->status == 1 ? 'Active' : 'Inactive'}}</span></td>
                                        @else
                                        <td><span class="badge text-bg-danger">{{$post->status == 1 ? 'Active' : 'Inactive'}}</span></td>
                                        @endif
                                        <td>{{ $post->Order_List == 1 ? 'First' : 'Secound' }}</td>
                                        <td>
                                            <a href="{{ url('/massrequestedit/' .$post->id) }}"><i class="bi bi-eye-fill"></i></a>
                                            <a href="{{ url('/massrequestedit/' .$post->id) }}"><i class="bi bi-pencil-square"></i></a>
                                            <a href="{{ url('/massrequesteditin/'. $post->id) }}"><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                            {{ $posts->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- End #main -->

@endsection
