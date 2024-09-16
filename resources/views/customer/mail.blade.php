<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer and Service Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #fff;
            max-width: 700px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            background-color: #6c63ff;
            color: #fff;
            padding: 10px 0;
            border-radius: 8px;
        }
        h3 {
            color: #6c63ff;
            border-bottom: 2px solid #6c63ff;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }
        p {
            color: #555;
            font-size: 16px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            background-color: #f0f0f0;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            color: #333;
        }
        .btn {
            display: inline-block;
            background-color: #6c63ff;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #5751d6;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #999;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hello {{$customer->customer_name}}, Thank You For Choosing Our Service!</h1>

        <h3>Check Your Information:</h3>
        <p><strong>Name:</strong> {{ $customer->customer_name }}</p>
        <p><strong>Email:</strong> {{ $customer->email }}</p>
        <p><strong>Mobile:</strong> {{ $customer->mobile }}</p>
        <p><strong>Address:</strong> {{ $customer->address }}</p>
        <p><strong>Product:</strong> {{ $productName }}</p>
        <p><strong>Product Amount:</strong> {{ $customer->product_amount }}</p>
        <p><strong>Warranty Start Date:</strong> {{ \Carbon\Carbon::parse($customer->start_date)->format('Y-m-d') }}</p>
        <p><strong>Warranty End Date:</strong> {{ \Carbon\Carbon::parse($customer->end_date)->format('Y-m-d') }}</p>

        <h3>Your Service Schedule:</h3>
        @if($serviceDetail->isEmpty())
            <p>No services scheduled.</p>
        @else
            <ul>
                @foreach($serviceDetail as $index => $service)
                    <li>
                        <strong>Service On:</strong> {{ \Carbon\Carbon::parse($service->service_date)->format('Y-m-d') }}
                    </li>
                @endforeach
            </ul>
        @endif

        <p>If you have any questions or need assistance, feel free to contact our support team.</p>

        <a href="#" class="btn">Contact Support</a>
    </div>

    <div class="footer">
        &copy; {{ date('Y') }} Our Company. All rights reserved.
    </div>
</body>
</html>

