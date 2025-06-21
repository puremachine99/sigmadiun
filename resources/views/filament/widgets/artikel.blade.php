<x-filament::widget>
    <x-filament::card>
        <h2 class="fi-wi-stats-overview-stat-label text-sm font-medium text-gray-500 dark:text-gray-400">Artikel Terbaru
        </h2>

        <ul class="space-y-4">
            @foreach ($this->getArticles() as $artikel)
                <li class="flex items-start space-x-4">
                    @if ($artikel->gambar)
                        <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}"
                            class="w-20 h-20 object-cover rounded" />
                    @endif
                    <div>
                        <h3 class="text-base font-semibold">{{ $artikel->judul }}</h3>
                        <p class="text-sm text-gray-500">
                            {{ \Illuminate\Support\Str::limit(strip_tags($artikel->konten), 100) }}</p>
                        <p class="text-xs text-gray-400 mt-1">{{ $artikel->created_at->format('d M Y') }}</p>
                    </div>
                </li>
            @endforeach
    </ul>
    </x-filament::card>
</x-filament::widget>
