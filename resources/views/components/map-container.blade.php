<div class="glass-card rounded-2xl overflow-hidden">
    <!-- Map Container -->
    <div id="map" class="w-full h-[600px]"></div>

    <!-- Map Controls -->
    <div class="p-5 flex flex-wrap gap-3 border-t border-slate-100">
        <div class="flex items-center bg-white px-4 py-2 rounded-xl shadow-sm">
            <i class="fas fa-search text-slate-400 mr-2"></i>
            <input type="text" placeholder="Cari kecamatan..."
                class="outline-none bg-transparent placeholder-slate-400 w-40">
        </div>
        <div class="flex items-center bg-white px-4 py-2 rounded-xl shadow-sm">
            <i class="fas fa-filter text-slate-400 mr-2"></i>
            <select class="outline-none bg-transparent text-slate-600">
                <option>Semua Kategori</option>
                <option>Pertanian</option>
                <option>Industri</option>
                <option>Perdagangan</option>
                <option>Pariwisata</option>
            </select>
        </div>
        <div class="flex items-center bg-white px-4 py-2 rounded-xl shadow-sm">
            <i class="fas fa-layer-group text-slate-400 mr-2"></i>
            <span class="text-slate-600">Lapisan Peta</span>
        </div>
        <div class="flex items-center bg-white px-4 py-2 rounded-xl shadow-sm">
            <i class="fas fa-ruler text-slate-400 mr-2"></i>
            <span class="text-slate-600">Pengukuran</span>
        </div>
        <div class="flex items-center bg-white px-4 py-2 rounded-xl shadow-sm">
            <i class="fas fa-sync-alt text-slate-400 mr-2"></i>
            <span class="text-slate-600">Reset Peta</span>
        </div>
    </div>
</div>