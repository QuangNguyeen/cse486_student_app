@extends('layouts.dashboard')

@section('title', 'Thêm sinh viên')

@section('content')
<div class="container mt-4">
    <h1>Thêm sinh viên mới</h1>
    <form action="{{ route('sinhviens.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="MASV" class="form-label">Mã SV</label>
            <input type="text" name="MASV" class="form-control" id="MASV" required>
        </div>
        <div class="mb-3">
            <label for="HOSV" class="form-label">Họ SV</label>
            <input type="text" name="HOSV" class="form-control" id="HOSV" required>
        </div>
        <div class="mb-3">
            <label for="TENSV" class="form-label">Tên SV</label>
            <input type="text" name="TENSV" class="form-control" id="TENSV" required>
        </div>
        <div class="mb-3">
            <label for="MALOP" class="form-label">Mã Lớp</label>
            <select name="MALOP" class="form-control" id="MALOP" required>
                <option value="">-- Chọn Lớp --</option>
                @foreach ($classes as $class)
                <option value="{{ $class->MALOP }}">{{ $class->MALOP }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="GIOITINH" class="form-label">Giới Tính</label>
            <select name="GIOITINH" class="form-control" id="GIOITINH">
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="DIACHI" class="form-label">Địa Chỉ</label>
            <input type="text" name="DIACHI" class="form-control" id="DIACHI">
        </div>
        <div class="mb-3">
            <label for="SDT" class="form-label">Số Điện Thoại</label>
            <input type="text" name="SDT" class="form-control" id="SDT">
        </div>

        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>
@endsection
