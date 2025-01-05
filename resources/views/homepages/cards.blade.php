@extends('layouts.dashboard')
@section('content')
<div class="card-container">
    <div class="carditem">
        <a href="{{route ('homepage')}}" class="text-decoration-none" style="text-decoration: none">
            <div class="card card-hover">
                <p class="card-title">Dashboard</p>
            </div>
        </a>
    </div>
    <div class="carditem">
        <a href="{{route ('sinhviens.index')}}" class="text-decoration-none" style="text-decoration: none">
            <div class="card card-hover">
                <p class="card-title">Thông Tin Sinh Viên</p>
            </div>
        </a>
    </div>
    <div class="carditem">
        <a href="{{route ('thongke.index')}}" class="text-decoration-none" style="text-decoration: none">
            <div class="card card-hover">
                <p class="card-title">Thống Kê Điểm</p>
            </div>
        </a>
    </div>
    <div class="carditem">
        <a href="{{route ('kyluat.index')}}" class="text-decoration-none"style="text-decoration: none">
            <div class="card card-hover">
                <p class="card-title">Kỷ Luật</p>
            </div>
        </a>
    </div>
    <div class="carditem">
        <a href="{{ route('hocbong.index') }}" class="text-decoration-none" style="text-decoration: none">
            <div class="card card-hover">
                <p class="card-title">Khen Thưởng</p>
            </div>
        </a>
    </div>
    <div class="carditem">
        <a href="{{ route('hocphi.index') }}" class="text-decoration-none" style="text-decoration: none">
            <div class="card card-hover">
                <p class="card-title">Học Phí</p>
            </div>
        </a>
    </div>
</div>
@endsection
