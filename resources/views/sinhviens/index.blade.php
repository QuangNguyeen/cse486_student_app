@extends('layouts.dashboard')

@section('title', 'Danh sách sinh viên')

@section('content')
<div class="container mt-4">
    <div class="header">
        <h1>Danh sách sinh viên</h1>
        <div class ="d-flex">
        <a href="{{ route('sinhvien.trangthai') }}" class="btn btn-primary">
            Cập nhật trạng thái sinh viên
        </a>
        <a href="{{ route('sinhviens.create') }}" class="btn btn-success">
           Thêm
        </a>
        </div>
        <input type="text" class="form-control search" placeholder="Tìm kiếm...">
    </div>
    <div class="table-container">
        @if($sinhviens->isEmpty())
            <div class="alert alert-warning text-center" role="alert">
                Không có sinh viên nào trong danh sách!
            </div>
        @else
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Mã SV</th>
                        <th scope="col">Họ</th>
                        <th scope="col">Tên SV</th>
                        <th scope="col">Mã Lớp</th>
                        <th scope="col">SĐT</th>
                        <th scope="col">Trang thai</th>

                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sinhviens as $sv)  
                        <tr>
                            <td>{{ $sv->MASV }}</td>
                            <td>{{ $sv->HOSV }}</td>
                            <td>{{ $sv->TENSV }}</td>
                            <td>{{ $sv->MALOP }}</td>
                            <td>{{ $sv->SDT }}</td>
                            <td>
                                <span class="badge {{ $sv->TRANGTHAI == 1 ? 'bg-success' : 'bg-danger' }}">
                                {{ $sv->TRANGTHAI == 1 ? 'Đang học' : 'Thôi học' }}
                                </span>
                            </td>
                            <td class="d-flex">
                                <a href="{{ route('sinhviens.edit', $sv->MASV) }}"><button type="button"
                                        class="btn btn-primary me-2">Sửa</button></a>
                                <form action="{{ route('sinhviens.destroy', $sv->MASV) }}" method="POST"
                                    onsubmit="return confirm('Bạn có chắc chắn muốn xóa sinh viên này không?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                                <a href="{{ route('sinhviens.show', $sv->MASV) }}" class="btn btn-primary">Show</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection