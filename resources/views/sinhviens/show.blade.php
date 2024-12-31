<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">
        <h2>Thông tin chi tiết sinh viên</h2>

        <!-- Thông tin cá nhân của sinh viên -->
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="card-title">Họ tên: {{ $sinhvien->HOSV }} {{ $sinhvien->TENSV }}</h4>
                <p><strong>Mã sinh viên:</strong> {{ $sinhvien->MASV }}</p>
                <p><strong>Lớp:</strong> {{ $sinhvien->MALOP }}</p>
                <p><strong>Giới tính:</strong> {{ $sinhvien->GIOITINH }}</p>
                <p><strong>Địa chỉ:</strong> {{ $sinhvien->DIACHI }}</p>
                <p><strong>Số điện thoại:</strong> {{ $sinhvien->SDT }}</p>
            </div>
        </div>

        <!-- Điểm các môn học -->
        <h3>Điểm các môn học</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Môn học</th>
                    <th>Điểm</th>
                    <th>Kỳ học</th>
                </tr>
            </thead>
            <tbody>
                @forelse  ($ketqua as $item)
            
                    <tr>
                        <td>{{ $item->TENMH }}</td>
                        <td>{{ $item->DIEM }}</td>
                        <td>{{ $item->KiHOC }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Không có dữ liệu điểm</td>
                    </tr>
                @endforelse 
            </tbody>
        </table>

        <a href="{{ route('sinhviens.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
    </div>
</body>
</html>
