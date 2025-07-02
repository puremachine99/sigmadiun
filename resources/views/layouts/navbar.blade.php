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
                    <span class="font-bold text-xl text-gray-900 tracking-tight">Client<span class="text-blue-600">Apps</span></span>
                    <p class="text-xs text-gray-500 -mt-1 tracking-wider">Dummy SSO hehe</p>
                </div>
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