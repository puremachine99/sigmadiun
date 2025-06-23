@props(['active' => null])

<nav x-data="{ open: false }" class="bg-white shadow-lg sticky top-0 z-50 transition-all duration-300">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <div class="bg-gradient-to-br from-blue-600 to-indigo-700 w-10 h-10 rounded-lg flex items-center justify-center shadow-md transform hover:rotate-6 transition-transform">
                    <i class="fas fa-map-marker-alt text-white text-lg"></i>
                </div>
                <div>
                    <span class="font-bold text-xl text-gray-900 tracking-tight">SIG<span class="text-blue-600">Madiun</span></span>
                    <p class="text-xs text-gray-500 -mt-1 tracking-wider">Sistem Informasi Geografis</p>
                </div>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}"
                    class="nav-link font-medium relative group transition-all duration-300 {{ $active === 'home' ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' }}">
                    Beranda
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('profil.index') }}"
                    class="nav-link font-medium relative group transition-all duration-300 {{ $active === 'profil' ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' }}">
                    Profil Daerah
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('potensi.index') }}"
                    class="nav-link font-medium relative group transition-all duration-300 {{ $active === 'potensi' ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' }}">
                    Potensi
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('umkm.index') }}"
                    class="nav-link font-medium relative group transition-all duration-300 {{ $active === 'umkm' ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' }}">
                    UMKM
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('peta.index') }}"
                    class="nav-link font-medium relative group transition-all duration-300 {{ $active === 'peta' ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' }}">
                    Peta
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#"
                    class="nav-link font-medium relative group transition-all duration-300 {{ $active === 'faq' ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' }}">
                    FAQ
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="flex items-center space-x-4">
                <button @click="open = !open" class="md:hidden text-xl text-gray-700 focus:outline-none">
                    <i x-show="!open" class="fas fa-bars transition-transform hover:scale-110"></i>
                    <i x-show="open" class="fas fa-times transition-transform hover:scale-110"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div x-show="open" x-cloak 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="md:hidden bg-white border-t border-gray-200 py-4 shadow-inner">
        <div class="container mx-auto px-4">
            <div class="flex flex-col space-y-3">
                <a href="{{ route('home') }}"
                    class="nav-link py-3 px-4 rounded-lg transition-all duration-300 flex items-center {{ $active === 'home' ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-700 hover:bg-gray-50' }}">
                    <i class="fas fa-home mr-3 w-5 text-center"></i>
                    Beranda
                </a>
                <a href="{{ route('profil.index') }}"
                    class="nav-link py-3 px-4 rounded-lg transition-all duration-300 flex items-center {{ $active === 'profil' ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-700 hover:bg-gray-50' }}">
                    <i class="fas fa-building mr-3 w-5 text-center"></i>
                    Profil Daerah
                </a>
                <a href="{{ route('potensi.index') }}"
                    class="nav-link py-3 px-4 rounded-lg transition-all duration-300 flex items-center {{ $active === 'potensi' ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-700 hover:bg-gray-50' }}">
                    <i class="fas fa-chart-line mr-3 w-5 text-center"></i>
                    Potensi
                </a>
                <a href="{{ route('umkm.index') }}"
                    class="nav-link py-3 px-4 rounded-lg transition-all duration-300 flex items-center {{ $active === 'umkm' ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-700 hover:bg-gray-50' }}">
                    <i class="fas fa-store mr-3 w-5 text-center"></i>
                    UMKM
                </a>
                <a href="{{ route('peta.index') }}"
                    class="nav-link py-3 px-4 rounded-lg transition-all duration-300 flex items-center {{ $active === 'peta' ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-700 hover:bg-gray-50' }}">
                    <i class="fas fa-map mr-3 w-5 text-center"></i>
                    Peta
                </a>
                <a href="#"
                    class="nav-link py-3 px-4 rounded-lg transition-all duration-300 flex items-center {{ $active === 'faq' ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-700 hover:bg-gray-50' }}">
                    <i class="fas fa-question-circle mr-3 w-5 text-center"></i>
                    FAQ
                </a>
            </div>
        </div>
    </div>
</nav>

<style>
    .nav-link {
        position: relative;
        padding-bottom: 5px;
        transition: all 0.3s ease;
    }
    
    .nav-link::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #2563eb, #1e40af);
        border-radius: 2px;
        transition: width 0.3s ease;
    }
    
    .nav-link:hover::after,
    .nav-link.active::after {
        width: 100%;
    }
    
    [x-cloak] {
        display: none !important;
    }
    
    .nav-link i {
        transition: transform 0.3s ease;
    }
    
    .nav-link:hover i {
        transform: translateX(3px);
    }
</style>

<!-- Include AlpineJS for interactivity -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>