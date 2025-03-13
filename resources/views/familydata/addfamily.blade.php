@extends('basedashboard') @section('title', 'addfamily') @section('content')
<main id="main" class="main">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-lg-5">
        <div class="container pt-5 pb-3 offset-lg-6 offset-md-6 offset-xs-0 offset-sm-6">
            <div id="massrequest-body" class="card">
                <div class="card-header">
                    <h3>Add Family</h3>
                </div>
                <div class="card-body p-2">
                    <form action="{{ route('savefamily') }}" method="POST">
                        @csrf
                        <div class="g-3 pb-2">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="user_id" id="floatingInputGrid" placeholder="enter request Name" />
                                    <label for="floatingInputGrid">Id</label>
                                </div>
                            </div>
                        </div>

                        <div class="g-3 pb-2">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" id="floatingInputGrid" placeholder="Name" />
                                    <label for="floatingInputGrid">Name</label>
                                </div>
                            </div>
                        </div>

                        <div class="g-3 pb-2">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="email" id="floatingInputGrid" placeholder="email" />
                                    <label for="floatingInputGrid">email</label>
                                </div>
                            </div>
                        </div>
                        <div class="g-3 pb-2">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="mobile" id="floatingInputGrid" placeholder="mobile" />
                                    <label for="floatingInputGrid">Mobile</label>
                                </div>
                            </div>
                        </div>
                        <div class="g-3 pb-2">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="dob" id="floatingInputGrid" placeholder="DOB" />
                                    <label for="floatingInputGrid">date of Birth</label>
                                </div>
                            </div>
                        </div>
                        <div class="g-3 pb-2">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="relation" id="floatingInputGrid" placeholder="Relation" />
                                    <label for="floatingInputGrid">Relation</label>
                                </div>
                            </div>
                        </div>

                        <!-- mass request details -->
                        <div>
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
