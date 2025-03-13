@extends('basedashboard') @section('title', 'Massrequest') @section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Request List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">General</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <div class="container">
        <div class="card">
            <div class="container p-3">
                <form action="{{ route('massrequests') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-floating">
                                <input type="date" class="form-control" name="date" id="floatingInputGrid" placeholder="select your date" />
                                <label for="floatingInputGrid">Date</label>
                            </div>
                            @if ($errors->has('date'))
                            <span class="text-danger">{{ $errors->first('mass_date') }}</span>
                            @endif
                        </div>

                        <!-- schedule list -->
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

                        <!-- schedule list -->
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="inputPassword2" class="sr-only"></label>
                                <button type="submit" class="btn btn-primary mb-2">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>SI NO</th>
                                <th>Name</th>
                                <th>Adress</th>
                                <th>Request</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="items-container" class="massrequestdata">
                            @include('massrequestlistdata')
                        </tbody>
                    </table>
                </div>

                <div class="ajax-load-gif text-center" style="display: none;">
                    <p><img src="{{ asset('assets/img/loadinggif.gif') }}" /></p>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- End #main -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var page = 1;
    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
            page++;
            loadMoreData(page);
        }
    });
    function loadMoreData(page) {
        $.ajax({
            url: "?page=" + page,
            type: "get",
            beforeSend: function () {
                $(".ajax-load-gif").show();
            },
        }).done(function (data) {
            if (!data.html || data.html.trim() === "") {
                $(".ajax-load-gif").html("No records!");
                return;
            }
            $(".ajax-load-gif").hide();
            $("#items-container").append(data.html);
            page++;
        });
    }

    // popover function

</script>

@endsection
