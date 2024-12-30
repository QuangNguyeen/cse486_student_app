<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <!-- Thêm Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Danh sách sinh viên</h1>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Mã SV</th>
                    <th scope="col">Họ SV</th>
                    <th scope="col">Tên SV</th>
                    <th scope="col">Mã Lớp</th>
                    <th scope="col">Giới Tính</th>
                    <th scope="col">Địa Chỉ</th>
                    <th scope="col">SĐT</th>
                    <th scope="col">Học Bổng</th>
                    <th scope="col">DRL</th>
                    <th scope="col">Trạng Thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sinhviens as $sv)
                <tr>
                    <td>{{ $sv->MASV }}</td>
                    <td>{{ $sv->HOSV }}</td>
                    <td>{{ $sv->TENSV }}</td>
                    <td>{{ $sv->MALOP }}</td>
                    <td>{{ $sv->GIOITINH }}</td>
                    <td>{{ $sv->DIACHI }}</td>
                    <td>{{ $sv->SDT }}</td>
                    <td>{{ number_format($sv->HOCBONG, 2) }}</td>
                    <td>{{ $sv->DRL }}</td>
                    <td>
                        <span class="badge {{ $sv->TRANGTHAI ? 'bg-danger' : 'bg-success' }}">
                            {{ $sv->TRANGTHAI ? 'Đã nghỉ' : 'Đang học' }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Thêm Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
