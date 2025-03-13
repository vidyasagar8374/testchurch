@extends('basedashboard') @section('title', 'donationInvoice') @section('content')
<main id="main" class="main">
    <!-- End Page Title -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="container pt-5 pb-3 offset-lg-2 offset-md-0 offset-xs-0 offset-sm-2">
            <div class="col-md-12">
                <div class="row">
                    <div class="receipt-main col-xs-12 col-sm-10 col-md-6 col-xs-offset-0 col-sm-offset-1 col-md-offset-3" id="receiptMain">
                        <div class="container">
                            <div class="text-center">
                                <h5>Infant Jesus Shrine</h5>
                                <h6>turkayamjal,RR dist,Telangana</h6>
                            </div>
                        </div>
                        <!-- img log and company details -->
                        <!-- <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="receipt-left">
                                            <img class="img-responsive" alt="iamgurdeeposahan" src="https://bootdey.com/img/Content/avatar/avatar6.png" style="width: 71px; border-radius: 43px;" />
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 text-end">
                                        <div class="receipt-right">
                                            <h5>Company Name.</h5>
                                            <p>+1 3649-6589 <i class="fa fa-phone"></i></p>
                                            <p>company@gmail.com <i class="fa fa-envelope-o"></i></p>
                                            <p>USA <i class="fa fa-location-arrow"></i></p>
                                        </div>
                                    </div>
                                
                            </div> -->
                        <!-- img log and company details -->
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-8 text-left">
                                <div class="receipt-right">
                                    <h5>{{ $donations->name  }}</h5>
                                    <p><b>Mobile :</b> {{ $donations->mobile }}</p>
                                    <!-- <p><b>Email :</b> {{ $donations->mobile_no }}</p> -->
                                    <p><b>Address :</b> {{ $donations->address }}</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6    col-md-4 text-end">
                                <div class="receipt-left p-2">
                                    <h4>INVOICE # <br> {{ $donations->id  }}</h4>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="recipt-table p-2">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="col-md-9">Donation for {{ $donations->donation_type }}</td>
                                            <td class="col-md-3"><i class="fa fa-inr"></i>{{ $donations->amount }}</td>
                                        </tr>
                                     
                                        <tr>
                                            <td class="text-right">
                                                <h2><strong>Total: </strong></h2>
                                            </td>
                                            <td class="text-left text-danger">
                                                <h2>
                                                    <strong><i class="fa fa-inr"></i>{{ $donations->amount }}/-</strong>
                                                </h2>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="receipt-header receipt-header-mid receipt-footer">
                                <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                                    <div class="receipt-right">
                                        <p><b> Requested Date :</b> {{ \Carbon\Carbon::parse($donations->created_at)->format('d-m-Y') }}</p>
                                        <h5 style="color: rgb(140, 140, 140);">Thanks for your contribution!</h5>
                                        <p>please visit again <b> www.infantjesushrineyamjal.org </b></p>
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
