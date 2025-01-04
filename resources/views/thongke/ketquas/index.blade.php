@extends('layouts.dashboard')

@section('content')
    <div class="content-header">
        <input type="text" placeholder="Nhập mã môn học">
        <button type="button">Tìm kiếm</button>
        <a href="{{ route('thongke.ketquas.create', ['malop' => $lop->MALOP, 'id' => $sinhvien->MASV]) }}" class="btn-nhap-diem">Nhập Điểm</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>Mã Môn học</th>
            <th>Kì học</th>
            <th>Lần thi</th>
            <th>Điểm</th>
            <th>Điểm chữ</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dsKetQua as $ketqua)
            <tr>
                <td>{{ $ketqua->MAMH }}</td>
                <td>{{ $ketqua->KIHOC}}</td>
                <td>{{ $ketqua->LANTHI}}</td>
                <td>{{ $ketqua->DIEMSO }}</td>
                <td>{{ $ketqua->DIEMCHU }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
