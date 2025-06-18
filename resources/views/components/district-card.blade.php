@props(['title', 'category', 'count', 'rating', 'description', 'colorClass', 'icon', 'buttonColor'])

<div class="kecamatan-card glass-card">
    <div class="h-40 bg-gradient-to-r {{ $colorClass }} relative">
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
        <div class="feature-badge bg-white {{ $buttonColor }} shadow">{{ $category }}</div>
        <h3 class="absolute bottom-4 left-4 text-white font-bold text-xl">{{ $title }}</h3>
    </div>
    <div class="p-5">
        <div class="flex justify-between items-center mb-2">
            <div class="flex items-center space-x-2">
                <i class="{{ $icon }}"></i>
                <span class="text-sm text-slate-600">{{ $count }} Potensi</span>
            </div>
            <div class="flex items-center space-x-1">
                <i class="fas fa-star text-yellow-400"></i>
                <span class="text-sm text-slate-600">{{ $rating }}</span>
            </div>
        </div>
        <p class="text-slate-600 text-sm mb-4">{{ $description }}</p>
        <button
            class="w-full {{ $buttonColor }} py-2.5 rounded-lg text-sm font-medium transition">
            Lihat Detail <i class="fas fa-arrow-right ml-2 text-xs"></i>
        </button>
    </div>
</div>