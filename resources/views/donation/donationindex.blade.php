@extends('basedashboard') @section('title', 'donationlist') @section('content')

<main id="main" class="main">
    <!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                        <h5 class="mb-0">Donation List</h5>
                        <div class="addbutton">
                            <a href="{{ route('donation') }}">
                                <button type="button" class="btn btn-outline-primary">Add +</button>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <!-- Default Table -->
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Adress</th>
                                    <th scope="col">Donation</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($donations as $donation)
                                <tr>
                                    <td>{{ $donation->id }}</td>
                                    <td>{{ $donation->name }}</td>
                                    <td>{{ $donation->mobile }}</td>
                                    <td>{{ $donation->adress }}</td>
                                    <td>{{ $donation->donation_type }}</td>
                                    <td>{{ $donation->amount }}</td>
                                    <td>
                                        <a href="/donation_invoice/{{ $donation->id }}"><i class="bi bi-eye-fill"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                       
                        <!-- End Default Table Example -->
                        {{ $donations->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
@endsection
