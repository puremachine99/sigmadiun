@props(['active' => null])

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
                <a href="{{ route('home') }}"
                    class="nav-link font-medium {{ $active === 'home' ? 'text-primary' : 'text-dark hover:text-primary' }}">Beranda</a>
                <a href="{{ route('profil.index') }}"
                    class="nav-link font-medium {{ $active === 'profil' ? 'text-primary' : 'text-dark hover:text-primary' }}">Profil Daerah</a>
                <a href="{{ route('potensi.index') }}"
                    class="nav-link font-medium {{ $active === 'potensi' ? 'text-primary' : 'text-dark hover:text-primary' }}">Potensi</a>
                <a href="{{ route('umkm.index') }}"
                    class="nav-link font-medium {{ $active === 'umkm' ? 'text-primary' : 'text-dark hover:text-primary' }}">UMKM</a>
                <a href="{{ route('peta.index') }}"
                    class="nav-link font-medium {{ $active === 'peta' ? 'text-primary' : 'text-dark hover:text-primary' }}">Peta</a>
                <a href="#"
                    class="nav-link font-medium {{ $active === 'faq' ? 'text-primary' : 'text-dark hover:text-primary' }}">FAQ</a>
            </div>

            <div class="flex items-center space-x-4">
                <button class="md:hidden text-xl text-slate-700">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
</nav>
