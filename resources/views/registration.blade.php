@extends('base')
@section('title', 'registration')
@section('content')
<div class="container pt-3 pb-3">
<div class="massrequest-sec">
   <div id="massrequest-body" class="card" >
      <div class="card-header">
         <h3>Massrequest</h3>
      </div>
      <div  class="card-body">
         <form  action="/registration/{registration}" method="POST">
         @csrf
         <div class="form-step">
            <div class="row  g-3 pb-2">
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="form-floating">
                     <input type="text" class="form-control" name="firstname" id="floatingInputGrid" placeholder="First Namess" >
                     <label for="floatingInputGrid">First Name</label>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="form-floating">
                     <input type="text" class="form-control" name="lastname" id="floatingInputGrid" placeholder="Last Name" >
                     <label for="floatingInputGrid">Last Name</label>
                  </div>
               </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="form-floating">
                     <input type="text" class="form-control" name="fathername" id="floatingInputGrid" placeholder="Father Name" >
                     <label for="floatingInputGrid">Father Name</label>
                  </div>
               </div>
               
            </div>
            <div class="form-step">
                <div class="row  g-3 pb-2">
                 <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="form-floating">
                     <input type="date" class="form-control" name="dob" id="floatingInputGrid" placeholder="date of birth" >
                     <label for="floatingInputGrid">DOB</label>
                  </div>
               </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="form-floating">
                     <input type="number" class="form-control" name="mobile" id="floatingInputGrid" placeholder="Mobile Number" >
                     <label for="floatingInputGrid">Mobile No</label>
                  </div>
               </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="form-floating">
                     <input type="text" class="form-control" name="address" id="floatingInputGrid" placeholder="address" >
                     <label for="floatingInputGrid">Address</label>
                  </div>
               </div>

            </div>
            <div class="row  g-3 pb-2">
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="form-floating">
                     <input type="email" class="form-control" name="email" id="floatingInputGrid" placeholder="Parish address or your address" >
                     <label for="floatingInputGrid">email</label>
                  </div>
                   @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
               </div>
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="form-floating">
                     <input type="date" class="form-control" name="dob" id="floatingInputGrid" placeholder="select your date">
                     <label for="floatingInputGrid">Date of birth</label>
                  </div>
            </div>
             <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="">
                    <label class="form-check-label" for="exampleRadios1">
                    Gender
                  </label>
                  <br>
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="male" >
                  <label class="form-check-label" for="exampleRadios1">
                     Male
                  </label>
                   <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="female" >
                  <label class="form-check-label" for="exampleRadios1">
                     Female
                  </label>
                  </div>
            </div>
         </div>
         <div class="form-step">
                <div class="row  g-3 pb-2">
                 <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                       
                        <div class="form-floating">
                           <select class="form-select" id="floatingSelect" name="familymember">
                              <option value="" >select</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                           </select>
                           <label for="floatingSelect">familymember</label>
                        </div>
                        @if ($errors->has('day_type'))
                        <span class="text-danger">{{ $errors->first('day_type') }}</span>
                     @endif
                     </div>
              
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="form-floating">
                     <input type="number" class="form-control" name="registernumber" id="floatingInputGrid" placeholder="Mobile Number" >
                     <label for="floatingInputGrid">registernumber</label>
                  </div>
               </div>
                 

            </div>
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