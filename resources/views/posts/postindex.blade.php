@extends('basedashboard') @section('title', 'youtubeindex') @section('content')

<main id="main" class="main">
    <!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                        <h5 class="mb-0">Post</h5>
                        <div class="addbutton">
                            <a href="{{ route('post') }}">
                                <button type="button" class="btn btn-outline-primary">Add +</button>
                            </a>
                        </div>
                    </div>
                   
                    <div class="card-body">
                        
                        <!-- Default Table -->
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Subtitle</th>
                                    <th scope="col">description</th>
                                    <th scope="col">date</th>
                                    <th scope="col">Imgage</th>
                                    <th scope="col">status</th>

                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->subtitle }}</td>
                                    <td>{{ $post->description }}</td>
                                    <td>{{ $post->date }}</td>
                                    <td><img src="{{ asset( $post->file ) }}" alt="" height="40px" width="50px" /></td>
                                    @if($post->status == 1)
                                    <td><span class="badge text-bg-success">{{$post->status == 1 ? 'Active' : 'Inactive'}}</span></td>
                                    @else
                                    <td><span class="badge text-bg-danger">{{$post->status == 1 ? 'Active' : 'Inactive'}}</span></td>
                                    @endif
                                    <td>
                                        <a href="{{ url('/viewpost/' . $post->id) }}"><i class="bi bi-eye-fill"></i></a>
                                        <a href="{{ url('/viewpost/'. $post->id) }}"><i class="bi bi-pencil-square"></i></a>
                                        <a href="{{ url('/destroypost/'. $post->id) }}"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                        
                        <!-- End Default Table Example -->
                        {{ $posts->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
@endsection
