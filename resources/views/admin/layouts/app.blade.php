<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn {
            padding: 10px 15px;
            color: white;
            background-color: #4CAF50;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }

        .btn-danger {
            background-color: #f44336;
        }

        .btn:hover {
            opacity: 0.8;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-control[type="file"] {
            padding: 5px;
        }

        .btn-submit {
            width: 100%;
            background-color: #4CAF50;
            padding: 12px;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
        }
        
        .btn-submit:hover {
            opacity: 0.8;
        }

        .mt-3 {
            margin-top: 20px;
        }

        
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
