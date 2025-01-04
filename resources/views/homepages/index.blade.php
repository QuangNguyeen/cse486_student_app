<!DOCTYPE html>
<html lang="en">


<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Trang Chính</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
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
        background: linear-gradient(135deg, #007bff, #6c757d);
        /* Hiệu ứng gradient */
        color: white;
        font-size: 18px;
        font-weight: bold;
        border-radius: 10px 10px 0 0;
        /* Bo tròn chỉ trên đầu */
    }

    .card-title {
        font-size: 16px;
        text-align: center;
        font-weight: bold;
    }


</style>


<body>
    <div class="row">
        <div class="col-md-3 mt-0">
            <h3 class="text-center mb-4" style="color: #0056d2">ThuyLoi university</h3>
            <a href="{{route ('homepage')}}">Dashboard</a>
            <a href="{{route ('sinhviens.index')}}">Thông tin sinh viên</a>
            <a href="{{route ('thongke.index')}}">Thống kê điểm</a>
            <a href="{{route ('kyluat.index')}}">Kỷ luật</a>
            <a href="{{ route('hocbong.index') }}">Khen thưởng</a>
            <a href="{{ route('hocphi.index') }}">Học phí</a>
           <a href="{{ route('totnghiep') }}">Tốt nghiệp</a>

        </div>

        <div class="col-md-9 mt-3 main-content">
            @include('homepages.cards') <!-- Gọi file card -->
        </div>

    </div>


</body>

</html>