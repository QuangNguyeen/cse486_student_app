@extends('layouts.dashboard')

@section('content')
    <div class="content-header">
        <input type="text" placeholder="Nhập mã sinh viên">
        <button type="button">Tìm kiếm</button>
        <button type="button" class="btn-nhap-diem">Nhập Điểm</button>
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
