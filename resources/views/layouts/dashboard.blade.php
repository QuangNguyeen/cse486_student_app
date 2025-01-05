<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Thông tin sinh viên</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background-color: #f9fafc;
        }

        .sidebar {
            width: 250px;
            background-color: #fff;
            border-right: 1px solid #ddd;
            padding: 20px;
        }

        .sidebar h1 {
            font-size: 20px;
            color: #0056d2;
            margin-bottom: 20px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            margin-bottom: 10px;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .menu-item:hover {
            background-color: #f0f0f0;
        }

        .menu-item i {
            margin-right: 10px;
            font-size: 18px;
        }

        .menu-item span {
            font-size: 16px;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        .content-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            gap: 10px;
        }

        .content-header input {
            width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-right: 10px;
        }

        .content-header select {
            width: 200px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-right: 10px;
        }

        .content-header button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #0056d2;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .content-header button:hover {
            background-color: #003f9a;
        }

        .chart-container {
            width: 100%;
            margin: 0 auto 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px; /* Bo tròn cả 4 góc */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .table th,
        .table td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #f9f9f9;
            font-weight: bold;
        }

        .table tr:hover {
            background-color: #f0f0f0;
        }

        .table a {
            color: #0056d2;
            text-decoration: none;
        }

        .profile {
            display: flex;
            align-items: center;
            margin-left: auto;
        }

        .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-left: 10px;
        }
        .content-header {
            display: flex;
            align-items: center;
            justify-content: space-between; /* Dàn đều các phần tử */
            margin-bottom: 20px;
        }

        .btn-nhap-diem {
            margin-left: auto; /* Đẩy nút sang bên phải */
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #0056d2;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-nhap-diem:hover {
            background-color: #003f9a;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            /* Màu nền trang */
            color: #333;
            margin: 0;
            padding: 0;
        }

        .row {
            display: flex;
        }

        .col-md-3 {
            background-color: #343a40;
            /* Sidebar màu tối */
            color: white;
            min-height: 100vh;
            /* Sidebar kéo dài toàn màn hình */
            padding: 20px;
        }

        .col-md-3 a {
            text-decoration: none;
            color: white;
            display: block;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .col-md-3 a:hover {
            background-color: #495057;
        }

        .main-content {
            padding: 20px;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            /* Khoảng cách giữa các thẻ card */
            justify-content: center;
            /* Căn giữa các card */
        }

        .carditem {
            flex: 1 0 calc(33.33% - 30px);
            /* Định dạng mỗi carditem chiếm 1/3 hàng */
            max-width: calc(33.33% - 30px);
            margin: 15px;
            background-color: #fff;
            /* Màu nền trắng */
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Đổ bóng nhẹ */
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }

        .carditem:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
            /* Hiệu ứng nổi lên khi hover */
        }

        .card {
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #007bff, #0056b3);
            text-decoration: none;
            /* Hiệu ứng gradient */
            color: white;
            font-size: 40px;
            font-weight: bold;
            border-radius: 10px 10px 0 0;
            /* Bo tròn chỉ trên đầu */
        }

        .card-title {
            font-size: 30px;
            text-align: center;
            font-weight: bold;
            text-decoration: none;
        }

    </style>
</head>
<body>
<!-- Sidebar -->
<div class="sidebar">
    <h1>Thuyloi University</h1>
    <a href="{{route ('homepage')}}" class="menu-item">
        <i class="fas fa-home"></i>
        <span>Trang chủ</span>
    </a>
    <a href="{{route ('sinhviens.index')}}" class="menu-item">
        <i class="fas fa-user"></i>
        <span>Thông tin sinh viên</span>
    </a>
    <a href="{{ route('thongke.index') }}" class="menu-item">
        <i class="fas fa-chart-bar"></i>
        <span>Thống kê điểm</span>
    </a>
    <a href="{{route ('kyluat.index')}}" class="menu-item">
        <i class="fas fa-graduation-cap"></i>
        <span>Kỷ luật</span>
    </a>
    <a href="{{ route('hocbong.index') }}" class="menu-item">
        <i class="fas fa-award"></i>
        <span>Khen thưởng</span>
    </a>
    <a href="{{ route('hocphi.index') }}" class="menu-item">
        <i class="fas fa-dollar-sign"></i>
        <span>Học phí</span>
    </a>
    <a href="#" class="menu-item">
        <i class="fas fa-cog"></i>
        <span>Cài đặt</span>
    </a>
</div>
<!-- Content -->
<div class="content">
    @yield('content')
</div>
@stack('scripts')
</body>
</html>
