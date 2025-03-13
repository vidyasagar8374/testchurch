@extends('basedashboard') @section('title', 'registerdata') @section('content')
<main id="main" class="main">
    <!-- End Page Title -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div id="massrequest-body" class="card">
                    <div class="card-header">
                        <h3>Massrequest</h3>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">From Address</th>
                                        <th scope="col">Requested Date</th>
                                        <th scope="col">Trasaction ID</th>
                                        <th scope="col">responseCode</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($masslistdata as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->fname }}</td>
                                        <td>{{ $data->from_address }}</td>
                                        <td>{{ $data->request_date }}</td>
                                        <td>{{ $data->transaction_id }}</td>
                                        <td>{{ $data->status }}</td>
                                        <td>
                                            <a href="/invoice/{{ $data->id }}"><i class="bi bi-eye-fill"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $masslistdata->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- End #main -->

@endsection
