<!-- resources/views/diem/nhap.blade.php -->
@extends('layouts.dashboard')
    @section('content')
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
          crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/form-create.css') }}">
    <title>Nhập Điểm</title>
</head>
<body>
<h1>Nhập Điểm Sinh Viên</h1>

<!-- Hiển thị thông báo thành công -->
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="{{ route('thongke.ketquas.store') }}" method="POST">
    @csrf
{{--    <input type="hidden" name="malop" value="{{ $malop }}">--}}
    @if(session('error'))
        <div class="alert alert-danger">
            <div>Sinh viên không được học quá 3 lần một môn học</div>
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
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
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Huỷ</a>
</form>
</body>
</html>
@endsection
