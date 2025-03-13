@extends('basedashboard') @section('title', 'requestlist') @section('content')
<main id="main" class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div id="massrequest-body" class="card">
                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                        <h5 class="mb-0">Schedule List</h5>
                        <div class="addbutton">
                            <a href="{{ route('schedulelist') }}">
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
                                        <th scope="col">Schedule</th>
                                        <th scope="col">status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->ScheduleList }}</td>
                                        @if($post->Status == 1)
                                        <td><span class="badge text-bg-success">{{$post->Status == 1 ? 'Active' : 'Inactive'}}</span></td>
                                        @else
                                        <td><span class="badge text-bg-danger">{{$post->Status == 1 ? 'Active' : 'Inactive'}}</span></td>
                                        @endif
                                        <!-- <td>{{ $post->file_path }}</td> -->

                                        <td>
                                            <a href="/scheduledit/{{ $post->id }}"><i class="bi bi-eye-fill"></i></a>
                                            <a href="/scheduledit/{{ $post->id }}"><i class="bi bi-pencil-square"></i></a>
                                            <a href="/scheduledelete/{{ $post->id }}"><i class="bi bi-trash"></i></a>
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
