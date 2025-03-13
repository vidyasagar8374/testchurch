@extends('basedashboard') @section('title', 'requestlist') @section('content')
<main id="main" class="main">
    <div class="content">
        <!-- content -->
 <div class="container">
     <div class="col-lg-12 col-md-12 col-xs-12">
     <div class="card">
         <div class="card-header"><h2>Add YouTube Post</h2> </div>
             <div class="card-body">
                             
                        <!-- Display Validation Errors -->
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

                    <!-- Form to add YouTube post -->
                    <form action="{{ route('admin.saveyoutube') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Title">
                                <label for="title">Title</label>
                            </div>
                             </div>
                             <div class="col-lg-6 col-md-6 col-xs-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle') }}" placeholder="Subtitle">
                                <label for="subtitle">Subtitle</label>
                            </div>
                         </div>
                         <div class="col-lg-6 col-md-6 col-xs-12">
                         <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" placeholder="Date">
                            <label for="date">Date</label>
                        </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="sponsor" name="sponsor" value="{{ old('sponsor') }}" placeholder="Sponsor">
                            <label for="sponsor">Sponsor</label>
                        </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="intention" name="intention" placeholder="Intention">{{ old('intention') }}</textarea>
                            <label for="intention">Intention</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                              <!-- Provider Select -->
                              <div class="form-floating mb-3">
                                <select class="form-select" id="provider" name="provider">
                                    <option value="divyavani" {{ old('provider') == 'divyavani' ? 'selected' : '' }}>Divyavani</option>
                                    <option value="catholichub" {{ old('provider') == 'catholichub' ? 'selected' : '' }}>CatholicHub</option>
                                </select>
                                <label for="provider">Provider</label>
                            </div>
                        </div>

                             <!-- YouTube URL Input -->
                             <div class="col-lg-6 col-md-6 col-xs-12">
                             <div class="form-floating mb-3">
                                <input type="url" class="form-control" id="youtube_url" name="youtube_url" value="{{ old('youtube_url') }}" placeholder="YouTube URL">
                                <label for="youtube_url">YouTube URL</label>
                            </div>
                         </div>
                         <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
             </div>
        
   </div>  <!--  //end card -->
 </div>
 </div>
        <!-- content -->
     </div>

</main> <!-- //end content -->


@endsection