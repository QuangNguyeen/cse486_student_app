<!-- resources/views/hocphis/index.blade.php -->
@extends('layouts.dashboard') <!-- Nếu dùng layout, thay 'app' bằng layout bạn muốn -->

@section('content')
<div class="container mt-4">
    <h1>Tra Cứu Học Phí</h1>
    <form action="{{ url('/hocphi/tinh') }}" method="GET" id="formHocPhi">
        <div class="mb-3">
            <label for="maSV" class="form-label">Mã Sinh Viên</label>
            <input type="text" name="maSV" id="maSV" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="kyHoc" class="form-label">Kỳ Học</label>
            <input type="text" name="kyHoc" id="kyHoc" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Xem Học Phí</button>
    </form>

    <div id="ketQuaHocPhi" class="mt-4"></div>
</div>

<script>
    document.getElementById('formHocPhi').addEventListener('submit', function (e) {
        e.preventDefault(); // Ngăn form reload page
        const maSV = document.getElementById('maSV').value;
        const kyHoc = document.getElementById('kyHoc').value;

        fetch(`/hocphi/tinh?maSV=${maSV}&kyHoc=${kyHoc}`)
            .then(response => response.json())
            .then(data => {
                const ketQuaDiv = document.getElementById('ketQuaHocPhi');
                ketQuaDiv.innerHTML = `
                    <h5>Kết Quả Học Phí:</h5>
                    <p><strong>Mã Sinh Viên:</strong> ${data.maSV}</p>
                    <p><strong>Kỳ Học:</strong> ${data.kyHoc}</p>
                    <p><strong>Học Phí:</strong> ${data.hocPhi.toLocaleString('vi-VN')} VNĐ</p>
                `;
            })
            .catch(error => console.error('Error:', error));
    });
</script>
@endsection
