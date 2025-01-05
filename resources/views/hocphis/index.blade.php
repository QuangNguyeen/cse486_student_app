<!-- resources/views/hocphis/index.blade.php -->
@extends('layouts.dashboard') <!-- Nếu dùng layout, thay 'app' bằng layout bạn muốn -->

@section('content')
    <div class="content-header">
        <h1>Tra Cứu Học Phí</h1>
        <input type="text" placeholder="Nhập mã sinh viên">
        <select name="kiHoc" id="kiHoc" class="form-select">
            <option value="">Chọn kỳ học</option>
            @foreach($dsKiHoc as $kiHoc)
                <option value="{{ $kiHoc->KIHOC }}">{{ $kiHoc->KIHOC }}</option>
            @endforeach
        </select>
        <button type="button">Tra Cứu</button>
        {{--    <a href="{{ route('thongke.ketquas.create', ['malop' => $lop->MALOP, 'id' => $sinhvien->MASV]) }}" class="btn-nhap-diem">Nhập Điểm</a>--}}
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>Mã Sinh Viên</th>
            <th>Họ</th>
            <th>Tên</th>
            <th>Kì Học</th>
            <th>Học phí</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection
