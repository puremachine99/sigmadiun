<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Potensi Investasi Kabupaten Madiun</title>
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
                        light: '#f8fafc',
                        success: '#10B981',
                        warning: '#F59E0B',
                        danger: '#EF4444'
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
        .invest-card {
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border-radius: 16px;
            overflow: hidden;
        }
        .invest-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        .stat-card {
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            transform: scale(1.05);
        }
        .progress-bar {
            height: 8px;
            border-radius: 4px;
            background: #e2e8f0;
            overflow: hidden;
        }
        .progress-fill {
            height: 100%;
            border-radius: 4px;
        }
        .category-item {
            transition: all 0.2s ease;
            border-radius: 10px;
        }
        .category-item:hover {
            background: rgba(37, 99, 235, 0.05);
            transform: translateX(5px);
        }
        .investor-badge {
            padding: 6px 12px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
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
                        <i class="fas fa-chart-line text-white text-lg"></i>
                    </div>
                    <div>
                        <span class="font-bold text-xl text-dark">Invest<span class="text-primary">Madiun</span></span>
                        <p class="text-xs text-slate-500 -mt-1">Potensi Investasi Kabupaten</p>
                    </div>
                </div>
                
                <div class="hidden md:flex space-x-8">
                    <a href="#" class="font-medium text-dark hover:text-primary">Beranda</a>
                    <a href="#" class="font-medium text-primary">Potensi</a>
                    <a href="#" class="font-medium text-dark hover:text-primary">Data</a>
                    <a href="#" class="font-medium text-dark hover:text-primary">Investor</a>
                    <a href="#" class="font-medium text-dark hover:text-primary">Tentang</a>
                </div>
                
                <div class="flex items-center space-x-4">
                    <button class="hidden md:flex items-center space-x-2 bg-primary/5 hover:bg-primary/10 text-primary px-4 py-2 rounded-lg transition">
                        <i class="fas fa-user-circle"></i>
                        <span>Login</span>
                    </button>
                    <button class="md:hidden text-xl text-slate-700">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-dark mb-2">PETA POTENSI INVESTASI KABUPATEN MADIUN</h1>
                <p class="text-slate-600 max-w-2xl">Temukan peluang investasi di berbagai sektor di Kabupaten Madiun</p>
            </div>
            <div class="mt-4 md:mt-0">
                <div class="relative">
                    <input type="text" placeholder="Cari sektor investasi..." 
                        class="w-full md:w-80 p-3 pr-10 rounded-lg border border-slate-300 focus:ring-2 focus:ring-primary focus:border-primary shadow-sm transition">
                    <button class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-500 hover:text-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Kategori Investasi 1 -->
                    <div class="glass-card invest-card p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-bold text-dark">Konstruksi</h2>
                            <div class="bg-blue-100 text-blue-600 investor-badge">Potensi Tinggi</div>
                        </div>
                        <ul class="space-y-3">
                            <li class="category-item flex items-center p-2">
                                <div class="w-6 h-6 bg-blue-500 rounded-full mr-3 flex items-center justify-center">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                                <span>Informasi dan Komunikasi</span>
                            </li>
                            <li class="category-item flex items-center p-2">
                                <div class="w-6 h-6 bg-blue-500 rounded-full mr-3 flex items-center justify-center">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                                <span>Administrasi</span>
                            </li>
                            <li class="category-item flex items-center p-2">
                                <div class="w-6 h-6 bg-blue-500 rounded-full mr-3 flex items-center justify-center">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                                <span>Jasa Pendidikan</span>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Kategori Investasi 2 -->
                    <div class="glass-card invest-card p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-bold text-dark">Perkanian, Kehutanan, dan Perikanan</h2>
                            <div class="bg-green-100 text-green-600 investor-badge">Potensi Strategis</div>
                        </div>
                        <ul class="space-y-3">
                            <li class="category-item flex items-center p-2">
                                <div class="w-6 h-6 bg-green-500 rounded-full mr-3 flex items-center justify-center">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                                <span>Perdagangan Besar dan Eceran</span>
                            </li>
                            <li class="category-item flex items-center p-2">
                                <div class="w-6 h-6 bg-green-500 rounded-full mr-3 flex items-center justify-center">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                                <span>Industrial Pengolahan</span>
                            </li>
                            <li class="category-item flex items-center p-2">
                                <div class="w-6 h-6 bg-green-500 rounded-full mr-3 flex items-center justify-center">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                                <span>Konstruksi</span>
                            </li>
                            <li class="category-item flex items-center p-2">
                                <div class="w-6 h-6 bg-green-500 rounded-full mr-3 flex items-center justify-center">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                                <span>Informasi dan Komunikasi</span>
                            </li>
                            <li class="category-item flex items-center p-2">
                                <div class="w-6 h-6 bg-green-500 rounded-full mr-3 flex items-center justify-center">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                                <span>Administrasi</span>
                            </li>
                            <li class="category-item flex items-center p-2">
                                <div class="w-6 h-6 bg-green-500 rounded-full mr-3 flex items-center justify-center">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                                <span>Jasa Pendidikan</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Statistik Investasi -->
                <div class="glass-card mt-8 p-6">
                    <h2 class="text-2xl font-bold text-dark mb-6">Statistik Potensi Investasi</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="stat-card bg-white rounded-xl p-5 shadow-sm">
                            <div class="flex justify-between mb-3">
                                <h3 class="font-bold text-slate-700">Perkanian, Kehutanan, dan Perikanan</h3>
                                <span class="font-bold text-success">25%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill bg-success" style="width: 25%"></div>
                            </div>
                        </div>
                        <div class="stat-card bg-white rounded-xl p-5 shadow-sm">
                            <div class="flex justify-between mb-3">
                                <h3 class="font-bold text-slate-700">Perdagangan Besar dan Eceran</h3>
                                <span class="font-bold text-primary">18%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill bg-primary" style="width: 18%"></div>
                            </div>
                        </div>
                        <div class="stat-card bg-white rounded-xl p-5 shadow-sm">
                            <div class="flex justify-between mb-3">
                                <h3 class="font-bold text-slate-700">Industrial Pengolahan</h3>
                                <span class="font-bold text-warning">14%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill bg-warning" style="width: 14%"></div>
                            </div>
                        </div>
                        <div class="stat-card bg-white rounded-xl p-5 shadow-sm">
                            <div class="flex justify-between mb-3">
                                <h3 class="font-bold text-slate-700">Konstruksi</h3>
                                <span class="font-bold text-danger">12%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill bg-danger" style="width: 12%"></div>
                            </div>
                        </div>
                        <div class="stat-card bg-white rounded-xl p-5 shadow-sm">
                            <div class="flex justify-between mb-3">
                                <h3 class="font-bold text-slate-700">Informasi dan Komunikasi</h3>
                                <span class="font-bold text-purple-500">7%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill bg-purple-500" style="width: 7%"></div>
                            </div>
                        </div>
                        <div class="stat-card bg-white rounded-xl p-5 shadow-sm">
                            <div class="flex justify-between mb-3">
                                <h3 class="font-bold text-slate-700">Administrasi</h3>
                                <span class="font-bold text-pink-500">5%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill bg-pink-500" style="width: 5%"></div>
                            </div>
                        </div>
                        <div class="stat-card bg-white rounded-xl p-5 shadow-sm">
                            <div class="flex justify-between mb-3">
                                <h3 class="font-bold text-slate-700">Jasa Pendidikan</h3>
                                <span class="font-bold text-indigo-500">4%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill bg-indigo-500" style="width: 4%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="space-y-8">
                <!-- Total Investor -->
                <div class="glass-card p-6">
                    <h2 class="text-2xl font-bold text-dark mb-4">Total Investor</h2>
                    <div class="flex items-center justify-center mb-4">
                        <div class="text-5xl font-bold text-primary">100+</div>
                    </div>
                    <div class="text-center text-slate-600">Perusahaan dan perorangan</div>
                </div>
                
                <!-- Total Investasi -->
                <div class="glass-card p-6">
                    <h2 class="text-2xl font-bold text-dark mb-4">Total Investasi</h2>
                    <div class="flex items-center justify-center mb-4">
                        <div class="text-4xl font-bold text-success">1.000.000.000+</div>
                    </div>
                    <div class="text-center text-slate-600">Rupiah</div>
                </div>
                
                <!-- Berita Terbaru -->
                <div class="glass-card p-6">
                    <h2 class="text-2xl font-bold text-dark mb-4">Berita Terbaru</h2>
                    <div class="space-y-4">
                        <div class="bg-white rounded-lg p-4 shadow-sm">
                            <div class="flex items-start">
                                <div class="bg-blue-100 p-2 rounded-full mr-3">
                                    <i class="fas fa-newspaper text-blue-600"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-dark">Sosialisasi Pelaku Usaha terkait OSS</h3>
                                    <p class="text-sm text-slate-500 mt-1">12 Juni 2023</p>
                                    <p class="text-slate-600 text-sm mt-2">Pemerintah Kabupaten Madiun mengadakan sosialisasi mengenai Online Single Submission (OSS) untuk pelaku usaha.</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg p-4 shadow-sm">
                            <div class="flex items-start">
                                <div class="bg-green-100 p-2 rounded-full mr-3">
                                    <i class="fas fa-chart-line text-green-600"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-dark">Peningkatan Investasi di Sektor Pertanian</h3>
                                    <p class="text-sm text-slate-500 mt-1">5 Juni 2023</p>
                                    <p class="text-slate-600 text-sm mt-2">Kabupaten Madiun mencatat peningkatan investasi sebesar 25% di sektor pertanian pada kuartal pertama tahun 2023.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-12 mt-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">InvestMadiun</h3>
                    <p class="text-slate-300 mb-4">Portal resmi potensi investasi di Kabupaten Madiun.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-slate-300 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-slate-300 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-slate-300 hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-slate-300 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div>
                    <h4 class="font-semibold text-lg mb-4">Navigasi</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-slate-300 hover:text-white">Beranda</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white">Potensi Investasi</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white">Data Statistik</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white">Prosedur Investasi</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-lg mb-4">Sektor Unggulan</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-slate-300 hover:text-white">Pertanian</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white">Perdagangan</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white">Industri</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white">Konstruksi</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white">Jasa Pendidikan</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-lg mb-4">Kontak</h4>
                    <ul class="space-y-3 text-slate-300">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-primary"></i>
                            <span>Jl. Raya Madiun No. 123, Kabupaten Madiun</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-phone mt-1 mr-3 text-primary"></i>
                            <span>(0351) 456-7890</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-envelope mt-1 mr-3 text-primary"></i>
                            <span>invest@madiunkab.go.id</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-slate-700 mt-8 pt-8 text-center text-slate-400">
                <p>© 2023 InvestMadiun. Hak cipta dilindungi.</p>
            </div>
        </div>
    </footer>
</body>
</html>