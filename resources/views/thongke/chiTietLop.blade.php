@extends('layouts.dashboard')

@section('content')
    <div class="content-header">
        <input type="text" placeholder="Nhập mã sinh viên">
        <button type="button">Tìm kiếm</button>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>Mã Lớp</th>
            <th>Mã Sinh Viên</th>
            <th>Họ</th>
            <th>Tên</th>
            <th>GPA</th>
            <th>Chi tiết</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sinhviens as $sinhvien)
            <tr>
                <td>{{ $sinhvien->MALOP }}</td>
                <td>{{ $sinhvien->MASV}}</td>
                <td>{{ $sinhvien->HOSV}}</td>
                <td>{{ $sinhvien->TENSV }}</td>
                <td>{{ number_format($sinhvien->GPA_TRUNGBINH, 2) }}</td>
                <td>
                    <a href="{{ route('thongke.ketquas', ['malop' => $lop->MALOP, 'id' => $sinhvien->MASV]) }}">Chi tiết</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
