@extends('layouts.dashboard')

@section('content')
    <div class="content-header">
        <input type="text" placeholder="Nhập mã lớp">
        <select name="major" id="major">
            <option value="">Chọn ngành</option>
            <option value="ktpm">Kỹ thuật phần mềm</option>
            <option value="mm">Mạng máy tính</option>
            <option value="attt">An toàn thông tin</option>
            <option value="cntt">Công nghệ thông tin</option>
        </select>
        <button type="button">Lọc</button>
    </div>

    <div class="chart-container" style="height: 300px; width: 100%;">
        <canvas id="studentChart"></canvas>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Mã Lớp</th>
            <th>Số Sinh Viên</th>
            <th>Giảng Viên Phụ Trách</th>
            <th>Ngành</th>
            <th>GPA</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
        const ctx = document.getElementById('studentChart').getContext('2d');
        {{--const labels = @json($data->pluck('MUCGPA'));--}}
        {{--const data = @json($data->pluck('SOLUONGSV'));--}}

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
                        text: 'Phân bố sinh viên theo GPA'
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
@endpush
