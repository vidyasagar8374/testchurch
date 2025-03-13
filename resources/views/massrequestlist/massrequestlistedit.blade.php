@extends('basedashboard')
@section('title', 'requestlist')
@section('content')
<main id="main" class="main">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="container pt-5 pb-3 offset-lg-6 offset-md-6 offset-xs-0 offset-sm-6">
   <div id="massrequest-body" class="card" >
      <div class="card-header">
         <h3>Update Massrequest list</h3>
      </div>
      <div  class="card-body p-3">
         <form  action="{{ route('massrequesteditin') }}" method="POST">
         @csrf
         <div class="form-step">
            <div class="row  g-3 pb-2">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-floating">
                     <input type="text" class="form-control" name="r_name" id="floatingInputGrid" value="{{ $posts->RequestList }}" placeholder="r_name" >
                     <input type="hidden" class="form-control" name="id" id="floatingInputGrid" value="{{ $posts->id }}"  >
                     <label for="floatingInputGrid">Request Name</label>
                  </div>
               </div>
        </div>
            <div class="row  g-3 pb-2">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-floating">
                     <input type="text" class="form-control" name="short_code" id="floatingInputGrid" value="{{ $posts->short_code }}" placeholder="shor_code" >
                     <label for="floatingInputGrid">short_Code</label>
                  </div>
               </div>
              
            </div>
            <div class="row  g-3 pb-2">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-floating">
                     <select class="form-select" id="floatingSelect"  name="status"  value="{{ $posts->status }}" aria-label="Floating label select example">
                        <option value="">select</option>
                        <option value="1" <?php echo ($posts->status == 1) ? 'selected' : ''; ?>>Active</option>
                        <option value="0" <?php echo ($posts->status == 0) ? 'selected' : ''; ?>>In-active</option>
                       
                     </select>
                     <label for="floatingSelect">Status</label>
                  </div>
               </div>
              
            </div>
            <div class="row  g-3 pb-2">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-floating">
                     <select class="form-select" id="floatingSelect"  name="Order_List" value="{{ $posts->Order_List }}"  aria-label="Floating label select example">
                        <option value="">select</option>
                        <option value="1"<?php echo ($posts->Order_List == 1) ? 'selected' : ''; ?>>Firt List</option>
                        <option value="2"<?php echo ($posts->Order_List == 2) ? 'selected' : ''; ?>>Secound List</option>
                       
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

</main><!-- End #main -->


@endsection
