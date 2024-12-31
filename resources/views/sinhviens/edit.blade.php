<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin sinh viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Chỉnh sửa thông tin sinh viên</h2>

        <!-- Hiển thị lỗi nếu có -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form chỉnh sửa -->
        <form action="{{ route('sinhviens.update', $sinhvien->MASV) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="MASV" class="form-label">Mã sinh viên</label>
                <input type="text" class="form-control" id="MASV" name="MASV" value="{{ old('MASV', $sinhvien->MASV) }}" required>
            </div>

            <div class="mb-3">
                <label for="HOSV" class="form-label">Họ sinh viên</label>
                <input type="text" class="form-control" id="HOSV" name="HOSV" value="{{ old('HOSV', $sinhvien->HOSV) }}" required>
            </div>

            <div class="mb-3">
                <label for="TENSV" class="form-label">Tên sinh viên</label>
                <input type="text" class="form-control" id="TENSV" name="TENSV" value="{{ old('TENSV', $sinhvien->TENSV) }}" required>
            </div>

            <div class="mb-3">
                <label for="MALOP" class="form-label">Mã lớp</label>
                <input type="text" class="form-control" id="MALOP" name="MALOP" value="{{ old('MALOP', $sinhvien->MALOP) }}" required>
            </div>

            <div class="mb-3">
                <label for="GIOITINH" class="form-label">Giới tính</label>
                <select class="form-control" id="GIOITINH" name="GIOITINH">
                    <option value="Nam" {{ old('GIOITINH', $sinhvien->GIOITINH) == 'Nam' ? 'selected' : '' }}>Nam</option>
                    <option value="Nữ" {{ old('GIOITINH', $sinhvien->GIOITINH) == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="DIACHI" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="DIACHI" name="DIACHI" value="{{ old('DIACHI', $sinhvien->DIACHI) }}">
            </div>

            <div class="mb-3">
                <label for="SDT" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" id="SDT" name="SDT" value="{{ old('SDT', $sinhvien->SDT) }}">
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('sinhviens.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</body>
</html>
