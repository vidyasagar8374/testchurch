@extends('basedashboard') @section('title', 'requestlist') @section('content')
<main id="main" class="main">
<div class="content">
       <!-- content -->
<div class="container-fluid">
    <div class="col-lg-12 col-md-12 col-xs-12">
    <div class="card">
          
            <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Youtube</h2>
            
            <a href="{{ route('admin.createyoutube') }}" class="btn btn-primary">
                Add New list
            </a>
        </div>
            <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
          <!-- start card body -->
          <div class="table-responsive">
            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Subtitle</th>
                <th scope="col">sponsers</th>
                <th scope="col">Intention</th>
                <th scope="col">provider</th>
                <th scope="col">Link</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
                <tbody>
                @if(count($yotubelists))
                    @php
                        $currentPage = $yotubelists->currentPage(); // Get current page number
                        $perPage = $yotubelists->perPage(); // Get number of items per page
                    @endphp
                    @foreach ($yotubelists as $key=> $list)
                        <tr>
                        <th scope="row">{{ ($key + 1) + ($perPage * ($currentPage - 1)) }}</th>
                            <td>{{$list->title }}</td>
                            <td>{{$list->subtitle }}</td>
                            <td>{{$list->sponsor }}</td>
                            <td>{{$list->intention }}</td>
                            <td>{{$list->provider }}</td>
                            <td>{{$list->youtube_id }}</td>
                                <!-- View Link -->
                                <td>
                                <a href="" class="btn btn-info btn-sm" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                
                                <!-- Update Link -->
                                <a href="{{ route('admin.viewyoutube', $list->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                
                                <!-- Delete Link -->
                                <form action="{{ route('admin.destroyotube', $list->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this banner?');">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" class="text-center">No Data Available</td> <!-- Set colspan to the number of columns -->
                    </tr>
                @endif

                
               
                </tbody>
            </table>
        </div>
            {{ $yotubelists->links('pagination::bootstrap-5') }}
        <!-- end card body -->
    </div>
        
    </div>  <!--  //end card -->
    </div>
    </div>
        <!-- content -->
        </div>
</main>
<!-- test here -->
@endsection