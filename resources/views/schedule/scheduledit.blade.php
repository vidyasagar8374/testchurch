@extends('basedashboard') @section('title', 'scheduledit') @section('content')
<main id="main" class="main">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="container pt-5 pb-3 offset-lg-6 offset-md-6 offset-xs-0 offset-sm-6">
   <div id="massrequest-body" class="card" >
      <div class="card-header">
         <h3>Edit Schedule</h3>
      </div>
      <div  class="card-body p-3">
         <form  action="{{ route('scheduleditpost') }}" method="POST">
         @csrf
         <div class="form-step">
            <div class="row  g-3 pb-2">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-floating">
                     <input type="text" class="form-control" name="ScheduleList" id="floatingInputGrid" placeholder="ScheduleList" value="{{ $posts->ScheduleList }}" >
                     <input type="hidden" class="form-control" name="id" id="floatingInputGrid" placeholder="id" value="{{ $posts->id }}" >
                     <label for="floatingInputGrid">Schedule Name</label>
                  </div>
               </div>
        </div>
           <!--  -->
           <div class="row  g-3 pb-2">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-floating">
                     <select class="form-select" id="floatingSelect"  name="Status"  aria-label="Floating label select example">
                        <option value="" >select</option>
                        <option value="1" <?php echo ($posts->status == 1) ? 'selected' : ''; ?>>active</option>
                        <option value="0" <?php echo ($posts->status == 0) ? 'selected' : ''; ?>>Incactive</option>
                       
                     </select>
                     <label for="floatingSelect">Order</label>
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
