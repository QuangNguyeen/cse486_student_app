@extends('layouts.dashboard')

@section('content')
    <div class="content-header">
        <select name="khoa" id="khoa" style="width: 300px">
            <option value="">Chọn khoa</option>
            @foreach($khoas as $khoa)
                <option value="{{ $khoa->MAKHOA }}">{{ $khoa->TENKHOA}}</option>
            @endforeach
        </select>
        <select name="nganh" id="nganh" style="width: 300px">
            <option value="">Chọn ngành</option>
{{--            @foreach($nganhs as $nganh)--}}
{{--                <option value="{{ $nganh->MANGANH }}">{{ $nganh->TENNGANH }}</option>--}}
{{--            @endforeach--}}
        </select>
        <button type="button">Tìm Kiếm</button>
    </div>

    <div class="chart-container" style="height: 400px; width: 100%; display: flex; justify-content: space-between; gap: 20px;">
        <div style="flex: 1;">
            <canvas id="studentChart" style="width: 100%; height: 100%;"></canvas>
        </div>
        <div style="flex: 1;">
            <canvas id="top5Lop" style="width: 100%; height: 100%;"></canvas>
        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Mã Lớp</th>
            <th>Số Sinh Viên</th>
            <th>Giảng Viên Phụ Trách</th>
            <th>Ngành</th>
            <th>GPA Trung Bình</th>
            <th>Chi tiết</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $lop)
            <tr>
                <td>{{ $lop->MALOP }}</td>
                <td>{{ $lop->SOSINHVIEN }}</td>
                <td>{{ $lop->GIANGVIEN_PHUTRACH }}</td>
                <td>{{ $lop->TENNGANH }}</td>
                <td>{{ number_format($lop->GPA_TRUNGBINH, 2) }}</td>
                <td><a href="{{ route('lop.sinhvien', ['malop' => $lop->MALOP]) }}">Chi tiết</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
        const ctx = document.getElementById('studentChart').getContext('2d');
        const labels = @json($dataChart->pluck('MUCGPA'));
        const data = @json($dataChart->pluck('SOLUONGSV'));
        const studentChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Số lượng sinh viên',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                    },
                    title: {
                        display: true,
                        text: 'Phân bố sinh viên theo học lực'
                    }
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 10,
                        bottom: 10
                    }
                }
            }
        });
        const topClassesCtx = document.getElementById('top5Lop').getContext('2d');
        const topClassesLabels = @json($top5Lop->pluck('MALOP'));
        const topClassesData = @json($top5Lop->pluck('GPA_TRUNGBINH'));
        const topClassesChart = new Chart(topClassesCtx, {
            type: 'bar',
            data: {
                labels: topClassesLabels,
                datasets: [{
                    label: 'GPA Trung Bình',
                    data: topClassesData,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: '5 Lớp có GPA trung bình cao nhất'
                    }
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 10,
                        bottom: 10
                    }
                }
            }
        });
    </script>
    <script>
    </script>
@endpush
