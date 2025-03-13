@extends('basedashboard') @section('title', 'invoice') @section('content')
<main id="main" class="main">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="container pt-5 pb-3 offset-lg-2 offset-md-0 offset-xs-0 offset-sm-2">
            <div class="col-md-12">
                <div class="receipt-main col-xs-10 col-sm-10 col-md-6" id="receiptMain">
                    <div class="container">
                        <div class="text-center">
                            <h2>Infant Jesus Shrine</h2>
                            <h6>turkayamjal,RR dist,Telangana</h6>
                        </div>
                    </div>
                    <!-- img log and company details -->
                    <div class="row">
                        <div class="col-xs-7 col-sm-8 col-md-8">
                            <div class="receipt-right">
                                <h5>{{ $masslistdata->fname }} {{ $masslistdata->lname }}</h5>
                                <p><b>Mobile :</b> {{ $masslistdata->mobile_no }}</p>
                                <p><b>Address :</b> {{ $masslistdata->from_address }}</p>
                            </div>
                        </div>
                        <div class="col-xs-5 col-sm-4 col-md-4 text-end">
                            <div class="receipt-left p-2">
                                <h6>
                                    INVOICE # <br />
                                    {{ $masslistdata->Payment_TranId }}
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="recipt-table p-2">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="col-md-9">Mass Request</td>
                                            <td class="col-md-3"><i class="fa fa-inr"></i>{{ $masslistdata->amount }}</td>
                                        </tr>

                                        <tr>
                                            <td class="text-right">
                                                <h2><strong>Total: </strong></h2>
                                            </td>
                                            <td class="text-left text-danger">
                                                <h2>
                                                    <strong><i class="fa fa-inr"></i>{{ $masslistdata->amount }}/-</strong>
                                                </h2>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="receipt-header receipt-header-mid receipt-footer">
                            <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                                <div class="receipt-right">
                                    <p><b>Requested Date :</b> {{ \Carbon\Carbon::parse($masslistdata->created_at)->format('d-m-Y') }}</p>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="receipt-left">
                                    <p>please visit again <b> www.infantjesushrineyamjal.org</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- print btn -->
                    <div class="container print text-center">
                        <button type="button" onclick="printDiv('receiptMain')" class="btn btn-outline-primary">Print</button>
                    </div>
                    <!-- print btn -->
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
@endsection
