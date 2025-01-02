@extends('layouts.dashboard') <!-- Nếu dùng layout, thay 'app' bằng layout bạn muốn -->

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống Kê Sinh Viên Học Bổng</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            padding: 10px 15px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #4cae4c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
            border-radius: 5px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        /* Responsive design */
        @media (max-width: 600px) {
            form {
                padding: 10px;
            }

            input[type="text"], button {
                font-size: 14px;
            }

            th, td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <h1>Sinh Viên Học Bổng</h1>
    <form id="hocbong-form">
        <label for="masv">Mã Sinh Viên:</label>
        <input type="text" id="masv" name="masv" required>
        
        <label for="kyHoc">Kỳ Học:</label>
        <input type="text" id="kyHoc" name="kyHoc" required>
        
        <button type="submit">Tìm</button>
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
