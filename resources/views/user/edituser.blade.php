@extends('basedashboard') @section('title', 'scheduledit') @section('content')
<main id="main" class="main">
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block"></span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Edit User</h5>
                    <p class="text-center small"></p>
                  </div>


                  <form class="row g-3 needs-validation" action="{{ route('updateuser') }}" method="post"  novalidate>
                    @csrf
                    <div class="col-12">
                      <label for="yourName" class="form-label">Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" value="{{ $useredits->name }}" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" value="{{ $useredits->email }}" required>
                      <input type="hidden" name="id" class="form-control" id="userId" value="{{ $useredits->user_id }}" required>
                      <div class="invalid-feedback"></div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" value="{{ $useredits->email }}" required>
                        <div class="invalid-feedback"></div>
                      </div>
                    </div>

                    <div class="col-12">
                        <label for="yourSelect" class="form-label">Is Member</label>
                        <select name="is_member" class="form-control" id="yourSelect" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                    

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Update</button>
                    </div>
                   
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
  @endsection