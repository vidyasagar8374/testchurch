@extends('basedashboard') @section('title', 'Donation') @section('content')
<main id="main" class="main">
    <!-- End Page Title -->
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="container pt-2 mb-3 offset-lg-6 offset-md-6 offset-xs-0 offset-sm-6">
            <div id="massrequest-body" class="card">
                <div class="card-header">
                    <h3>Donation</h3>
                </div>
                <div class="card-body p-3">
                    <form action="{{ route('donationSave') }}" method="POST">
                        @csrf
                        <div class="form-step">
                            <div class="row g-3 pb-2">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="name" id="floatingInputGrid" placeholder="enter request Name" />
                                        <label for="floatingInputGrid">name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 pb-2">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="mobile" id="floatingInputGrid" placeholder="Parish address or your address" />
                                        <label for="floatingInputGrid">Mobile</label>
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="row g-3 pb-2">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="address" id="floatingInputGrid" placeholder="Parish address or your address" />
                                        <label for="floatingInputGrid">Address</label>
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="row g-3 pb-2">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" name="donation_type" aria-label="Floating label select example">
                                    <option value="Church">Church</option>
                                    <option value="MiteBox">MiteBox</option>
                                    <option value="Old Age">Old Age</option>
                                </select>
                                <label for="floatingSelect">Donation For</label>
                            </div>
                          </div>
                            <!--  -->
                            <div class="row g-3 pb-2">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="amount" id="floatingInputGrid" placeholder="Parish address or your address" />
                                        <label for="floatingInputGrid">Amount</label>
                                    </div>
                                </div>
                            </div>
                            <!--  -->

                            <!-- mass request details -->
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-xs-12">
                                    <button type="submit" class="btn btn-primary col-12">submit</button>
                                </div>
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
