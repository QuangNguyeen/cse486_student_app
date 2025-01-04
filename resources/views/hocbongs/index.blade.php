@extends('layouts.dashboard') <!-- Nếu dùng layout, thay 'app' bằng layout bạn muốn -->

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống Kê Sinh Viên Học Bổng</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

   <style>
       form#hocbong-form {
    margin-bottom: 20px;
    background-color: #f9f9f9;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

form#hocbong-form label {
    font-weight: bold;
    margin-right: 10px;
}

form#hocbong-form input {
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-right: 10px;
    width: 200px;
}

form#hocbong-form button {
    background-color: #5a6268;
    color: white;
    border: none;
    padding: 8px 16px;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form#hocbong-form button:hover {
    background-color: #495057;
}

/* Table styling */
table#result-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table#result-table th,
table#result-table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}

table#result-table thead {
    background-color: #343a40;
    color: white;
}

table#result-table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

table#result-table tbody tr:hover {
    background-color: #e9ecef;
}

table#result-table th {
    font-weight: bold;
}

table#result-table td {
    font-size: 14px;
}
    </style>
</head>
<body>
    <h1>Sinh Viên Học Bổng</h1>
    <a href="{{ route('statistical.index') }}">   <button type="submit" class="btn btn-secondary">Thống kê</button> </a> 

    <form id="hocbong-form">
        <label for="masv">Mã Sinh Viên:</label>
        <input type="text" id="masv" name="masv" required>
        
        <label for="kyHoc">Kỳ Học:</label>
        <input type="text" id="kyHoc" name="kyHoc" required>
        
        <button type="submit" class="btn btn-success">Tìm</button>
    </form>

    <h2>Kết Quả:</h2>
    <table id="result-table" border="1">
        <thead>
            <tr>
        
                <th>Họ SV</th>
                <th>Tên SV</th>
                <th>GPA</th>
                <th>Số Tiền Học Bổng</th>


            </tr>
        </thead>


        
        <tbody>
            <!-- Dữ liệu sẽ được thêm vào đây -->
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#hocbong-form').on('submit', function(e) {
                e.preventDefault(); // Ngăn chặn việc gửi form theo cách thông thường

                var masv = $('#masv').val();
                var kyHoc = $('#kyHoc').val();

                $.ajax({
                    url: '{{ url("api/hocbong") }}', // URL gọi đến API của bạn
                    type: 'GET',
                    data: {
                        masv: masv,
                        kyHoc: kyHoc
                    },
                    success: function(data) {
                        var tbody = $('#result-table tbody');
                        tbody.empty(); // Xóa các hàng cũ trong bảng

                        if (data.length > 0) {
                            // Thêm dữ liệu vào bảng
                            $.each(data, function(index, sinhVien) {
                                tbody.append('<tr>' +
                                 
                                    '<td>' + sinhVien.HOSV + '</td>' +
                                    '<td>' + sinhVien.TENSV + '</td>' +
                                    '<td>' + sinhVien.GPA + '</td>' +
                                    '<td>' + sinhVien.HOCBONG + '</td>' +
                                    '</tr>');
                            });
                        } else {
                            tbody.append('<tr><td colspan="5">Không có dữ liệu</td></tr>');
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        alert('Có lỗi xảy ra khi gọi API');
                    }
                });
            });
        });
    </script>
</body>
</html>
@endsection
