@extends('base')
@section('title', 'passwordupdate')
@section('content')
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="container pt-5 pb-3 offset-lg-6 offset-md-6 offset-xs-0 offset-sm-6">
   <div id="massrequest-body" class="card" >
      <div class="card-header">
         <h3>password Update</h3>
      </div>
      <div  class="card-body">
         <form  action="{{ route('newpasswordupdate') }}" method="POST">
         @csrf
         <div class="form-step">
            <div class="row  g-3 pb-2">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-floating">
                     <input type="password" class="form-control" name="password" id="floatingInputGrid" placeholder="enter password" >
                     <label for="floatingInputGrid">Password</label>
                  </div>
               </div>
        </div>
            <div class="row  g-3 pb-2">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-floating">
                     <input type="password" class="form-control" name="matchpassword" id="floatingInputGrid" placeholder="enter Confirm password" >
                     <input type="hidden" class="form-control" name="id" id="floatingInputGrid" value="{{ $id }}" >
                     <input type="hidden" class="form-control" name="token" id="floatingInputGrid" value="{{ $token }}" >
                     <label for="floatingInputGrid">Confirm Password</label>
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