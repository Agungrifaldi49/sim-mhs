<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
       html, body {
    height: 100%;       /* pastikan tinggi penuh */
    margin: 0;
    padding: 0;
}

.wrapper {
    display: flex;
    min-height: 100vh;  /* tinggi minimum 100% viewport */
}

.sidebar {
    width: 260px;
    background: linear-gradient(180deg, #6f42c1 0%, #a98eda 50%, #d2b48c 100%);
    color: #fff;
    flex-shrink: 0;
    display: flex;
    flex-direction: column;
    padding: 20px 0;
    position: fixed;   /* sidebar tetap di kiri */
    height: 100vh;
    overflow-y: auto;  /* scroll jika konten sidebar panjang */
}

.content {
    flex: 1;
    margin-left: 260px; /* sisakan ruang sidebar */
    padding: 20px;
    overflow-y: auto;  /* scroll untuk konten */
}

    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            @include('layouts.admin.sidebar')
        </div>

        <!-- Konten -->
        <div class="content">
            @yield('content')
        </div>
    </div>
    @stack('scripts')

</body>
</html>
