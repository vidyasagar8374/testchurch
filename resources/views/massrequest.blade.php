@extends('basedashboard') @section('title', 'Massrequest') @section('content')
<main id="main" class="main">
    <!-- End Page Title -->
    <div class="massrequest">
        <div class="massrequest-sec">
            <div id="massrequest-body" class="card">
                <div class="card-header">
                    <h3>Massrequest</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('massrequestsave') }}" method="POST">
                        @csrf
                        <div class="form-step">
                            <div class="row g-3 pb-2">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="fname" id="floatingInputGrid" placeholder="enter request Name" />
                                        <label for="floatingInputGrid">First Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="lname" id="floatingInputGrid" placeholder="enter request Name" />
                                        <label for="floatingInputGrid">Last Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="Spouse" id="floatingInputGrid" placeholder="enter request Name" />
                                        <label for="floatingInputGrid">Spouse</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 pb-2">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="from_address" id="floatingInputGrid" placeholder="Parish address or your address" />
                                        <input type="hidden" class="form-control" name="massreq" id="floatingInputGrid" value="massrequest" placeholder="Parish address or your address" />
                                        <label for="floatingInputGrid">From</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" name="mass_date" id="floatingInputGrid" placeholder="select your date" />
                                        <label for="floatingInputGrid">Date</label>
                                    </div>
                                    @if ($errors->has('mass_date'))
                                    <span class="text-danger">{{ $errors->first('mass_date') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect" name="day_type">
                                            <option value="">select</option>
                                            @foreach($daywise as $data)
                                            <option value="{{ $data->id }}">{{ $data->ScheduleList }}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelect">Select Day</label>
                                    </div>
                                    @if ($errors->has('day_type'))
                                    <span class="text-danger">{{ $errors->first('day_type') }}</span>
                                    @endif
                                </div>
                            </div>
                            <!-- mass request details -->
                            <div class="row g-3 pb-2">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    @foreach ($radiobuttons as $radiobutton)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" />
                                        <label class="form-check-label" for="inlineCheckbox1">{{$radiobutton->RequestList}}</label>
                                    </div>
                                    @endforeach
                                
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect" name="massrequest[first]" aria-label="Floating label select example">
                                            <option value="">select</option>
                                            @foreach($massrequestlist as $data)
                                            <option value="{{$data->id}}">{{ $data->RequestList }}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelect">selectOptions-1</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 hide-before">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingInputGrid" name="response[first]" placeholder="Type relavant name" />
                                        <label for="floatingInputGrid">Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect" name="massrequest[second]" aria-label="Floating label select example">
                                            <option value="">select</option>
                                            @foreach($massrequestlist as $data)
                                            <option value="{{$data->id}}">{{ $data->RequestList }}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelect">select-Options-2</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 hide-before">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingInputGrid" placeholder="type relavant name" name="response[second]" />
                                        <label for="floatingInputGrid">Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 hide-before">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingInputGrid" placeholder="type relavant name" name="mobile_no" />
                                        <label for="floatingInputGrid">Mobile No</label>
                                    </div>
                                </div>
                            </div>
                            <!-- payment row for admin -->
                            @if (auth()->user()->usertype == 'admin')
                            <div class="row g-3 pb-2">
                                 <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="paymentid" id="floatingInputGrid" placeholder="enter request Name" />
                                        <label for="floatingInputGrid">Transaction ID</label>
                                    </div>
                                </div> 
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="paymentmethod" id="floatingInputGrid" placeholder="enter request Name" />
                                        <label for="floatingInputGrid">Payment Mode</label>
                                    </div>
                                </div> 
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="amount" id="floatingInputGrid" placeholder="enter request Name" />
                                        <label for="floatingInputGrid">Amount</label>
                                    </div>
                                </div>  
                            </div>
                            @endif
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
</main>
<!-- End #main -->
@endsection
