<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Potensi Kota Madiun</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb',
                        secondary: '#0ea5e9',
                        dark: '#1e293b',
                        light: '#f8fafc'
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            min-height: 100vh;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .map-container {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .kecamatan-card {
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border-radius: 16px;
            overflow: hidden;
        }

        .kecamatan-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }

        .feature-badge {
            position: absolute;
            top: 16px;
            right: 16px;
            padding: 6px 12px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
            z-index: 10;
        }

        .legend-item {
            transition: all 0.2s ease;
            border-radius: 10px;
        }

        .legend-item:hover {
            background: rgba(37, 99, 235, 0.05);
            transform: translateX(5px);
        }

        .stat-bar {
            height: 8px;
            border-radius: 4px;
            background: #e2e8f0;
            overflow: hidden;
        }

        .stat-fill {
            height: 100%;
            border-radius: 4px;
        }

        .activity-item {
            position: relative;
            padding-left: 30px;
        }

        .activity-item::before {
            content: "";
            position: absolute;
            left: 8px;
            top: 16px;
            width: 2px;
            height: calc(100% - 16px);
            background: #cbd5e1;
        }

        .activity-icon {
            position: absolute;
            left: 0;
            top: 0;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
        }

        .nav-link {
            position: relative;
            padding-bottom: 5px;
        }

        .nav-link::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background: #2563eb;
            border-radius: 3px;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .custom-tooltip {
            background: white;
            border-radius: 6px;
            padding: 8px 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            color: #1f2937;
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="font-sans text-slate-800 bg-light">
    <!-- Navbar -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-3">
                    <div class="bg-primary w-10 h-10 rounded-lg flex items-center justify-center">
                        <i class="fas fa-map text-white text-lg"></i>
                    </div>
                    <div>
                        <span class="font-bold text-xl text-dark">SIG<span class="text-primary">Madiun</span></span>
                        <p class="text-xs text-slate-500 -mt-1">Sistem Informasi Geografis</p>
                    </div>
                </div>

                <div class="hidden md:flex space-x-8">

                    <a href="#" class="nav-link font-medium text-dark hover:text-primary">Beranda</a>
                    <a href="#" class="nav-link font-medium text-dark hover:text-primary">Profil Daerah</a>
                    <a href="#" class="nav-link font-medium text-dark hover:text-primary">Potensi</a>
                    <a href="#" class="nav-link font-medium text-dark hover:text-primary">UMKM</a>
                    <a href="#" class="nav-link font-medium text-primary">Peta</a>
                    <a href="#" class="nav-link font-medium text-dark hover:text-primary">FAQ</a>
                </div>

                <div class="flex items-center space-x-4">
                    {{-- <button
                        class="hidden md:flex items-center space-x-2 bg-primary/5 hover:bg-primary/10 text-primary px-4 py-2 rounded-lg transition">
                        <i class="fas fa-user-circle"></i>
                        <span>Admin</span>
                    </button> --}}
                    <button class="md:hidden text-xl text-slate-700">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    @yield('footer')

    @yield('scripts')
</body>

</html>
