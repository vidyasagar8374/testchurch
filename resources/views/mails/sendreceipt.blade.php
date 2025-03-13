<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Invoice</h1>
        <p><strong>Invoice Number:</strong>  {{ $masslistdata->Payment_TranId }}</p>
        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($masslistdata->created_at)->format('d-m-Y') }}</p>

        <h2>Bill To:</h2>
        <p>{{ $masslistdata->fname }} {{ $masslistdata->lname }}</p>
        <p> {{ $masslistdata->mobile_no }}</p>
        <p>{{ $masslistdata->from_address }}</p>

        <h2>Itemized Charges:</h2>
        <table>
            <tr>
                <th>Description</th>
               
                <th>Amount</th>
            </tr>
           
            <tr>
                <td>Mass Request</td>
                <td>{{ $masslistdata->amount }}</td>
                
            </tr>
            
        </table>

        <div class="total">
          
            <p><strong>Total:</strong> {{  $masslistdata->amount }}</p>
        </div>
        <p>Thank you for your business!</p>
    </div>
</body>
</html>
