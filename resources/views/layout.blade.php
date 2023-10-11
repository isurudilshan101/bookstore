<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body{
            background-color:rgb(203, 205, 219) !important;    
        }

        .page_heading {
            margin-top: 20px !important;
            display: flex;
            justify-content: space-between;
        }

        .buttons{
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 10px;
        }

        .error_message{
            margin-top: 10px;
            width: 50% !important;
            color:red !important;
        }

      
        .heading {
            font-family: 'cursive_font', cursive;  
            color: #3498db;  
            font-size: 36px;  
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);  
            margin-top: 6px;
        }
         
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Store</title>
    <!-- Add these lines to your layout head section -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
     
    @yield('content')
</body>
</html>