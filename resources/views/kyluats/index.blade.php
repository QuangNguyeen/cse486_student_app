@extends('layouts.dashboard')

@section('content')
{{--<div class="container">--}}
{{--    <h1 class="text-center">Thông Tin Kỷ Luật Sinh Viên</h1>--}}
{{--    <table class="table table-striped table-bordered">--}}
{{--        <thead>--}}
{{--            <tr>--}}
{{--                <th>MSV</th>--}}
{{--                <th>Họ</th>--}}
{{--                <th>Tên</th>--}}
{{--                <th>Số Tín Chỉ Đã Học</th>--}}
{{--                <th>Số Tín Chỉ Nợ</th>--}}
{{--                <th>Trạng Thái</th>--}}
{{--            </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--            @foreach($students as $student)--}}
{{--                <tr>--}}
{{--                    <td>{{ $student->MaSV }}</td>--}}
{{--                    <td>{{ $student->HoSV }}</td>--}}
{{--                    <td>{{ $student->TenSV }}</td>--}}
{{--                    <td>{{ $student->sotinchidahoc }}</td>--}}
{{--                    <td>--}}
{{--                        @if($student->sotinchino > 0)--}}
{{--                            {{ $student->sotinchino }} <!-- Hiện số tín chỉ nợ nếu lớn hơn 0 -->--}}
{{--                        @else--}}
{{--                            Không nợ <!-- Nếu không có tín chỉ nợ, hiển thị "Không nợ" -->--}}
{{--                        @endif--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        @if($student->TrangThai == 0)--}}
{{--                            Đuổi học--}}
{{--                        @elseif($student->TrangThai == 1)--}}
{{--                            đang học--}}
{{--                        @else--}}
{{--                            Không xác định--}}
{{--                        @endif--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}
{{--</div>--}}
<div class="content-header">
    <h1>Thông Tin Kỷ Luật Sinh Viên</h1>
    <input type="text" placeholder="Nhập mã sinh viên">
    <button type="button">Tìm kiếm</button>
</div>
<table class="table">
    <thead>
    <tr>
        <th>Mã Sinh Viên</th>
        <th>Họ</th>
        <th>Tên</th>
        <th>Số Tín Đã Học</th>
        <th>Số Tín Nợ</th>
        <th>Trạng Thái</th>
    </tr>
    </thead>
    <tbody>
    @foreach($dsSinhVien as $student)
        <tr>
            <td>{{ $student->MaSV }}</td>
            <td>{{ $student->HoSV }}</td>
            <td>{{ $student->TenSV }}</td>
            <td>{{ $student->sotinchidahoc }}</td>
            <td>
                @if($student->sotinchino > 0)
                    {{ $student->sotinchino }} <!-- Hiện số tín chỉ nợ nếu lớn hơn 0 -->
                @else
                    Không nợ <!-- Nếu không có tín chỉ nợ, hiển thị "Không nợ" -->
                @endif
            </td>
            <td>
                @if($student->TrangThai == 1)
                    Đã nghỉ
                @elseif($student->TrangThai == 0)
                    Đang học
                @else
                    Không xác định
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
