<!-- resources/views/diem/nhap.blade.php -->

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập Điểm</title>
</head>
<body>
<h1>Nhập Điểm Sinh Viên</h1>

<!-- Hiển thị thông báo thành công -->
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="{{ route('diem.store') }}" method="POST">
    @csrf
    <div>
        <label for="masv">Mã Sinh Viên:</label>
        <input type="text" id="masv" name="masv" value="{{ old('masv') }}" required>
        @error('masv')
        <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="mamh">Mã Môn Học:</label>
        <input type="text" id="mamh" name="mamh" value="{{ old('mamh') }}" required>
        @error('mamh')
        <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="diem">Điểm:</label>
        <input type="number" id="diem" name="diem" value="{{ old('diem') }}" min="0" max="10" required>
        @error('diem')
        <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="kihoc">Kỳ Học:</label>
        <input type="text" id="kihoc" name="kihoc" value="{{ old('kihoc') }}" required>
        @error('kihoc')
        <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">Lưu Điểm</button>
</form>
</body>
</html>
