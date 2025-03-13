@extends('basedashboard') 
@section('title', 'totalmassrequest') 
@section('content')

<main id="main" class="main">
            <form action="{{ route('massrequests') }}" method="post">
                    @csrf
                    <div class="row">
                        <!-- Date Field -->
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" name="date" id="date" placeholder="Select your date">
                            @if ($errors->has('date'))
                                <span class="text-danger">{{ $errors->first('date') }}</span>
                            @endif
                        </div>

                        <!-- Schedule List -->
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <label for="day_type">Select Day</label>
                            <select class="form-control" id="day_type" name="day_type">
                                <option value="">Select</option>
                                @foreach($daywise as $data)
                                    <option value="{{ $data->id }}">{{ $data->ScheduleList }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('day_type'))
                                <span class="text-danger">{{ $errors->first('day_type') }}</span>
                            @endif
                        </div>

                        <!-- Search Button -->
                        <div class="col-lg-2 col-md-2 col-sm-12 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
         
       
            <div class="table-mass mt-3">
                <div class="table-responsive">
                    @if($masslist->count() > 0)
                        <table class="table table-bordered">
                            <thead class="table">
                                <tr>
                                    <th>SI NO</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Request</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @include('massrequestlistdata')
                            </tbody>
                        </table>
                        {{ $masslist->links('pagination::bootstrap-5') }}
                    @else
                        <p class="text-center mt-3">No records found.</p>
                    @endif
                </div>
            </div>
       </div>
    
</main>

@endsection
