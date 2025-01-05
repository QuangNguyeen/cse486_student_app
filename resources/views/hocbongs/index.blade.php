@extends('layouts.dashboard')
@section('content')
    <div class="content-header">
        <h1>Thống Kê Học Bổng Sinh Viên</h1>
        <form action="{{ route('hocbong.thongke') }}" method="POST">
            @csrf
            <input type="text" name="masv" id="masv" placeholder="Nhập mã sinh viên">
            <select name="kihoc" id="kiHoc" class="form-select">
                <option value="">Chọn kỳ học</option>
                @foreach($dsKiHoc as $kiHoc)
                    <option value="{{ $kiHoc->KIHOC }}">{{ $kiHoc->KIHOC }}</option>
                @endforeach
            </select>
            <button type="submit">Tìm kiếm</button>
        </form>
    </div>

    <!-- Hiển thị bảng nếu có kết quả -->
    @if(isset($dsHocBong) && count($dsHocBong) > 0)
        <table class="table">
            <thead>
            <tr>
                <th>Mã Sinh Viên</th>
                <th>Họ</th>
                <th>Tên</th>
                <th>GPA</th>
                <th>Học bổng</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dsHocBong as $student)
                <tr>
                    <td>{{ $student->MASV }}</td>
                    <td>{{ $student->HoSV }}</td>
                    <td>{{ $student->TenSV }}</td>
                    <td>{{ number_format($student->GPA, 2) }}</td>
                    <td>{{ $student->HocBong }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <!-- Hiển thị thông báo không có kết quả ở dưới bảng -->
        <p>Không có kết quả</p>
    @endif
@endsection
