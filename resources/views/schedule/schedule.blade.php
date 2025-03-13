@extends('basedashboard') @section('title', 'schedule') @section('content')
<main id="main" class="main">
    <!-- End Page Title -->
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="container pt-5 pb-3 offset-lg-6 offset-md-6 offset-xs-0 offset-sm-6">
   <div id="massrequest-body" class="card" >
      <div class="card-header">
         <h3>Schedule</h3>
      </div>
      <div  class="card-body">
         <form  action="{{ route('schedulepost') }}" method="POST">
         @csrf
         <div class="form-step">
            <div class="row  g-3 pb-2">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-floating">
                     <input type="text" class="form-control" name="r_name" id="floatingInputGrid" placeholder="r_name" >
                     <label for="floatingInputGrid">Request Name</label>
                  </div>
               </div>
        </div>
     
        <div class="row  g-3 pb-2">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-floating">
                     <select class="form-select" id="floatingSelect"  name="Status"  aria-label="Floating label select example">
                        <option value="" >select</option>
                        <option value="1">active</option>
                        <option value="0">Incactive</option>
                       
                     </select>
                     <label for="floatingSelect">Status</label>
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


@endsection
