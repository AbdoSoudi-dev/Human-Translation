<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Widely24 invoice</title>
    <style>
        body{
            font-family: "Oswald",sans-serif !important;
            position: relative;
        }
        .d-inline-block{
            display: inline-block;
        }
        .form-group{
            margin-bottom: -15px;
        }
        .text-left{
            text-align: left;
        }
        .ml-20{
            margin-left: 20px;
        }
        .text-capitalize{
            text-transform: capitalize;
        }
        table{
            width: 100%;
        }
        tfoot td{
            font-weight: bold;
        }
        #data {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 50px ;
        }

        #data td, #data th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        #data tr:nth-child(even){background-color: #f2f2f2;}

        #data tr:hover {background-color: #ddd;}

        #data th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #004488;
            color: white;
        }
        .position-absolute{
            position: absolute;
            right: 0;
            top: 25px;
        }

    </style>
</head>
<body>
    <div class="position-absolute">
        <div class="form-group d-inline-block text-left">
            <h5>INVOICE NO.</h5>
            <p>{{ $payment->invoice_id }}</p>
        </div>
        <div class="form-group d-inline-block text-left ml-20">
            <h5>CURRENCY</h5>
            <p>EUR</p>
        </div>
        <div class="form-group text-left">
            <h5>DATE ISSUED</h5>
            <p>{{ date("d M Y", strtotime($payment->created_at)) }}</p>
        </div>
    </div>
    <table>
        <tbody>
            <tr>
                <td width="70">
                    <h1>TAX INVOICE</h1>
                    <h5>Paid To</h5>
                    <p>Professional translators’ community</p>
                    <h5>Job Owner:</h5>
                    <p class="text-capitalize">{{ $payment->user->name }}</p>
                    <h5>Type file:</h5>
                    <p >{{ $payment->order->file_type }}</p>
                    <h5>Number of words:</h5>
                    <p >{{ $payment->order->words }}</p>
                    <h5>Field / Specialty:</h5>
                    <p >{{ $payment->order->field }} / {{ $payment->order->specialist }}  </p>
                    <h5>For:</h5>
                    <p >{{ $payment->order->trans_from }} to {{ $payment->order->trans_to }} Translation </p>
                    <h5>Project ID:</h5>
                    <p >{{ $payment->order->project_id }} </p>
                </td>
                <td width="30">

                </td>
            </tr>
        </tbody>
    </table>

    <table id="data">
        <thead>
            <tr>
                <th>Description</th>
                <th>Words</th>
                <th>rate</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $payment->order->project_name }}</td>
                <td>{{ $payment->order->words }} words</td>
                <td>{{ $payment->order->amount }} EUR per {{ $payment->order->words }} words</td>
                <td>€ {{ $payment->order->amount }}</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td>Total (EUR)</td>
                <td>€ {{ $payment->order->amount }}</td>
            </tr>
        </tfoot>

    </table>


    <table>
        <tbody>
        <tr>
            <td>
                <img src="{{ config("app.url") }}/images/logo-blue.png" width="50">
                Powered by widely24.com
            </td>
        </tr>
        </tbody>
    </table>

</body>
</html>
