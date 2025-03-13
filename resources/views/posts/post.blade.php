@extends('basedashboard')
@section('title', 'posts')
@section('content')
<main id="main" class="main">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="container pt-5 pb-3 offset-lg-6 offset-md-6 offset-xs-0 offset-sm-6">
   <div id="massrequest-body" class="card " >
      <div class="card-header">
         <h3>Posts</h3>
      </div>
      <div  class="card-body p-3">
         <form  action="{{ route('postsave') }}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="form-step">
            <div class="row  g-3 pb-2">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-floating">
                     <input type="text" class="form-control" name="p_name" id="floatingInputGrid" placeholder="enter request Name" >
                     <label for="floatingInputGrid">Post Name</label>
                  </div>
               </div>
        </div>
            <div class="row  g-3 pb-2">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-floating">
                     <input type="text" class="form-control" name="description" id="floatingInputGrid" placeholder="Parish address or your address" >
                     <label for="floatingInputGrid">Description</label>
                  </div>
               </div>
              
            </div>
            <div class="row  g-3 pb-2">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-floating">
                     <input type="file" class="form-control" name="file" id="floatingInputGrid">
                     <label for="floatingInputGrid">file</label>
                  </div>
               </div>
              
            </div>
            <!-- mass request details -->
         <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
             <button type="submit" class="btn btn-primary col-12">submit</button>
            </div>
         </div>
     </form>
      </div>
   </div>
</div>
</div>
</main><!-- End #main -->








@endsection
