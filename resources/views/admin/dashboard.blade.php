@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
         <h1 class="mb-4"><i class="bi bi-speedometer2"></i> Dashboard</h1>
        </div>
        <div class="col">
            <!-- Jam & Tanggal -->
            <div class="mb-3 text-end">
                <h6><i class="bi bi-clock"></i> <span id="tanggalJam" class="text-secondary"></span></h6>
            </div>

        </div>
    </div>
   
    <div class="row mb-4">
        <!-- Mahasiswa Aktif -->
        <div class="col-md-4">
            <div class="card mb-3 shadow-sm" style="background: linear-gradient(135deg, #6a1b9a, #9c4dcc); color: #fff;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-7">
                            <h3 class="card-title">Mahasiswa Aktif</h3>
                             <!-- <p class="card-text text-center" style="font-size: 50px;">{{ $jumlahMahasiswa ?? 0 }}</p> -->
                        </div>
                        <div class="col">
                            <i class="bi bi-people-fill" style="font-size: 100px;"></i>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Dosen -->
        <div class="col-md-4">
            <div class="card mb-3 shadow-sm" style="background: linear-gradient(135deg, #8e44ad, #c39bd3); color: #fff;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-7">
                            <h3 class="card-title">Dosen</h3>
                            <!-- <p class="card-text text-center" style="font-size: 50px">{{ $jumlahDosen ?? 0}}</p> -->
                        </div>
                        <div class="col">
                            <i class="bi bi-person-badge" style="font-size: 100px;"></i>

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Mata Kuliah -->
        <div class="col-md-4">
            <div class="card mb-3 shadow-sm" style="background: linear-gradient(135deg, #d7ccc8, #a1887f); color: #2c2c2c;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-7">
                            <h3 class="card-title">Mata Kuliah</h3>
                            <!-- <p class="card-text text-center" style="font-size: 50px;">{{ $jumlahMataKuliah ?? 0}}</p> -->
                        </div>
                        <div class="col">
                            <i class="bi bi-book" style="font-size: 100px;"></i>

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik contoh pakai Chart.js -->
     <div class="row">
        <div class="col-md-6">
<div class="card shadow-sm">
    <div class="card-header" style="background-color:#6a1b9a; color:white;">
        Statistik Mahasiswa per Fakultas
    </div>
    <div class="card-body" style="background-color:#f5f5f5;">
        <div style="max-width: 600px; margin: auto;">
            <canvas id="chartMahasiswa" height="300"></canvas>
        </div>
    </div>
</div>
        </div>
     </div>


<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chartMahasiswa').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Teknik', 'Ekonomi', 'Hukum', 'Pertanian', 'Kedokteran'],
        datasets: [{
            label: 'Jumlah Mahasiswa',
            data: [320, 250, 180, 140, 310],
            backgroundColor: [
                'rgba(106, 27, 154, 0.7)',  // ungu tua
                'rgba(156, 77, 204, 0.7)',  // ungu muda
                'rgba(194, 155, 211, 0.7)', // ungu pastel
                'rgba(215, 204, 200, 0.7)', // coklat muda
                'rgba(161, 136, 127, 0.7)'  // coklat soft
            ],
            borderRadius: 8
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false, // penting supaya height 300px berlaku
        plugins: {
            legend: {
                labels: { color: '#4a148c' }
            }
        },
        scales: {
            x: { ticks: { color: '#4a148c' } },
            y: { ticks: { color: '#4a148c' } }
        }
    }
});
</script>
<script>
// Fungsi menampilkan tanggal & jam
function tampilkanTanggalJam() {
    const sekarang = new Date();

    // Nama hari dan bulan
    const namaHari = ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
    const namaBulan = ["Januari","Februari","Maret","April","Mei","Juni",
                       "Juli","Agustus","September","Oktober","November","Desember"];

    const hari = namaHari[sekarang.getDay()];
    const tanggal = sekarang.getDate();
    const bulan = namaBulan[sekarang.getMonth()];
    const tahun = sekarang.getFullYear();

    let jam = sekarang.getHours();
    let menit = sekarang.getMinutes();
    let detik = sekarang.getSeconds();

    // Tambahkan nol di depan jika kurang dari 10
    jam = jam < 10 ? '0'+jam : jam;
    menit = menit < 10 ? '0'+menit : menit;
    detik = detik < 10 ? '0'+detik : detik;

    const teks = `${hari}, ${tanggal} ${bulan} ${tahun} ${jam}:${menit}:${detik}`;
    document.getElementById('tanggalJam').textContent = teks;
}

// Update setiap 1 detik
setInterval(tampilkanTanggalJam, 1000);

// Jalankan segera
tampilkanTanggalJam();
</script>


@endsection
