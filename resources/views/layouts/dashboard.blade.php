<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Thuyloi University')</title>
    <!-- Thêm Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
        body {
            background-color: #f7f7f7;
        }

        .sidebar {
            color: white;
            height: 100vh;
            padding: 20px;
            background-color: #343a40;

        }

        .sidebar h2 {
            font-size: 20px;
            color: #0056d2;
            margin-bottom: 20px;
        }

        .sidebar ul {
            margin-bottom: 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
        }
        .sidebar a:hover{
            background-color: #495057;
            

        }

        .sidebar a:hover {
            text-decoration: underline;
        }

        .menu-list li {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Thuyloi University</h2>
            <nav class="mt-4">
                <mul class="list-unstyled menu-list">
                    <li><a href="{{route ('homepage')}}">Dashboard</a></li>
                    <li><a href="{{route ('sinhviens.index')}}">Thông tin sinh viên</a></li>
                    <li><a href="{{route ('thongke.index')}}">Thống kê điểm</a></li>
                    <li><a href="{{ route('kyluat.index') }}">Kỷ luật</a></li>
                    <li><a href="{{ route('hocbong.index') }}">Khen Thưởng</a></li> <!-- Thêm dòng này -->
                    <li><a href="{{ route('hocphi.index') }}">Học phí</a></li>
                    <li><a href="{{ route('totnghiep') }}">Tốt nghiệp</a></li>
                </mul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-fill">
            @yield('content')
        </div>
    </div>
    @stack('scripts')
    <!-- Thêm Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
