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

<h1>Thống kê sinh viên tốt nghiệp theo kỳ học</h1>
<form id="hocbong-form">
    <label for="kyHoc">Kỳ Học:</label>
    <input type="text" id="kyHoc" name="kyHoc" required placeholder="VD: 2023A">
    <button type="submit" class="btn btn-secondary">Thống kê</button>
</form>

<h2>Kết Quả:</h2>
<p id="no-data-message" style="display: none; color: red; font-weight: bold;">Không có sinh viên tốt nghiệp trong kỳ này.</p>
<table id="result-table">
    <thead>
        <tr>
            <th>Mã SV</th>
            <th>Họ Tên SV</th>
    
        </tr>
    </thead>
    <tbody>
        <!-- Dữ liệu sẽ được chèn vào đây qua JavaScript -->
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        $('#hocbong-form').on('submit', function (e) {
            e.preventDefault();

            var kyHoc = $('#kyHoc').val().trim();
            var noDataMessage = $('#no-data-message');
            var resultTable = $('#result-table tbody');

            // Ẩn thông báo không có dữ liệu
            noDataMessage.hide();

            if (!kyHoc) {
                alert('Vui lòng nhập kỳ học!');
                return;
            }

            $.ajax({
                url: '{{ url('api/totnghiep') }}', // Đường dẫn API
                type: 'GET',
                data: { kyHoc: kyHoc },
                success: function (data) {
                    resultTable.empty(); // Xóa dữ liệu cũ

                    if (data.length > 0) {
                        $.each(data, function (index, sinhVien) {
                            resultTable.append(`
                                <tr>
                                    <td>${sinhVien.MaSV}</td>
                                    <td>${sinhVien.HoTen}</td>
                                 
                        
                                </tr>
                            `);
                        });
                    } else {
                        // Hiển thị thông báo không có dữ liệu
                        noDataMessage.show();
                    }
                },
                error: function (xhr) {
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
