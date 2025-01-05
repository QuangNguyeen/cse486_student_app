@extends('layouts.dashboard')

@section('content')
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
<h1>Thống kê sinh viên nhận học bổng theo kỳ học</h1>
<form id="hocbong-form">
    <label for="kyHoc">Kỳ Học:</label>
    <input type="text" id="kyHoc" name="kyHoc" required>
    <button type="submit" class="btn btn-secondary">Thống kê</button>
</form>


<h2>Kết Quả:</h2>
<table id="result-table" border="1">
    <thead>
        <tr>
            <th>Mã Sinh Viên</th>
            <th>Họ</th>
            <th>Tên</th>
            <th>GPA</th>
            <th>Học Bổng</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#hocbong-form').on('submit', function (e) {
            e.preventDefault();

            var kyHoc = $('#kyHoc').val();

            $.ajax({
                url: '{{ url(path: "api/statistical") }}', // Đường dẫn API
                type: 'GET',
                data: {
                    kyHoc: kyHoc
                },
                success: function (data) {
                    var tbody = $('#result-table tbody');
                    tbody.empty(); // Xóa dữ liệu cũ

                    if (data.length > 0) {
                        $.each(data, function (index, sinhVien) {
                            tbody.append(`
                                <tr>
                                    <td>${sinhVien.MASV}</td>
                                    <td>${sinhVien.HoSV}</td>
                                    <td>${sinhVien.TenSV}</td>
                                    <td>${sinhVien.GPA}</td>
                                    <td>${sinhVien.HocBong}</td>
                                </tr>
                            `);
                        });
                    } else {
                        tbody.append('<tr><td colspan="5">Không có dữ liệu</td></tr>');
                    }
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                    var errorMessage = 'Có lỗi xảy ra khi gọi API';
                    if (xhr.responseJSON && xhr.responseJSON.error) {
                        errorMessage = xhr.responseJSON.error;
                    } else if (xhr.status === 404) {
                        errorMessage = 'Không tìm thấy API';
                    } else if (xhr.status === 500) {
                        errorMessage = 'Lỗi máy chủ';
                    }
                    alert(errorMessage);
                }
            });
        });
    });
</script>
@endsection
