<!DOCTYPE html>
<html lang="en">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chính</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       
        
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: scale(1.05);
            box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.2);
        }

       
        .carditem
        {
            
        }

        .card-title {
            font-size: 16px;
            text-align: center;
            font-weight: bold;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px; /* Khoảng cách giữa các thẻ card */
        }
    </style>

<body>
    <div class="row">
        <div class="col-md-3 mt-0">
            @extends('layouts.dashboard') 
            @section('dashboard')
            @endsection
         
        </div>

        <div class="col-md-9 mt-3 main-content">
            @include('homepages.cards') <!-- Gọi file card -->
        </div>
    
    </div>
</body>

</html>
