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
        :root {
            --primary: #1E3A8A;
            /* Biru tua tegas dan profesional */
            --primary-dark: #0F2A5F;
            /* Variasi biru lebih gelap */
            --primary-light: #3B82F6;
            /* Biru cerah untuk aksen */
            --secondary: #D4AF37;
            /* Emas elegan untuk highlight */
            --accent: #2563EB;
            /* Biru medium untuk penekanan */
            --light: #F8FAFC;
            /* Biru sangat muda untuk background */
            --dark: #1F2937;
            /* Biru tua untuk teks */
            --neutral: #4B5563;
            /* Abu-abu biru untuk teks sekunder */
        }

        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            background: linear-gradient(135deg, #f0f7ff 0%, #e6f0ff 100%);
            min-height: 100vh;
            color: var(--dark);
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.98);
            box-shadow: 0 2px 15px rgba(30, 58, 138, 0.1);
        }

        .hero-section {
            background: linear-gradient(rgba(30, 58, 138, 0.85), rgba(15, 42, 95, 0.9)),
                url('https://images.unsplash.com/photo-1519501025264-65ba15a82390?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(30, 58, 138, 0.25);
        }

        .section-title {
            color: var(--primary);
        }

        .section-title:after {
            background: var(--secondary);
        }

        .stat-card {
            background: white;
            border: 1px solid #E5E7EB;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .stat-card:hover {
            border-color: var(--primary-light);
            box-shadow: 0 12px 25px rgba(30, 58, 138, 0.1);
        }

        .stat-number {
            color: var(--primary);
        }

        .commitment-section {
            background: linear-gradient(rgba(30, 58, 138, 0.9), rgba(15, 42, 95, 0.95)),
                url('https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
        }

        .quote-text {
            border-left: 4px solid var(--secondary);
        }

        .form-control:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }

        .social-icon:hover {
            background-color: var(--primary);
        }

        .whatsapp-btn {
            background-color: #25D366;
        }

        .whatsapp-btn:hover {
            background-color: #128C7E;
        }

        /* Animasi khusus untuk elegan */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animated-section {
            animation: fadeInUp 0.6s ease-out forwards;
        }
    </style>

</head>

<body class="font-sans text-slate-800 bg-light flex flex-col min-h-screen">
    @php
        use Illuminate\Support\Facades\Route;

        $currentRoute = Route::currentRouteName();
        $activeMenu = match (true) {
            $currentRoute && str_starts_with($currentRoute, 'home') => 'home',
            $currentRoute && str_starts_with($currentRoute, 'profil') => 'profil',
            $currentRoute && str_starts_with($currentRoute, 'potensi') => 'potensi',
            $currentRoute && str_starts_with($currentRoute, 'umkm') => 'umkm',
            $currentRoute && str_starts_with($currentRoute, 'peta') => 'peta',
            $currentRoute && str_starts_with($currentRoute, 'faq') => 'faq',
            default => '',
        };
    @endphp


    @include('layouts.navbar', ['active' => $activeMenu])

    <main>
        @yield('content')
    </main>
    @yield('footer')

    @yield('scripts')
</body>

</html>
