<div class="mt-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-dark">Kecamatan Unggulan</h2>
        <a href="#" class="text-primary hover:text-primary/80 flex items-center space-x-1">
            <span>Lihat Semua</span>
            <i class="fas fa-chevron-right text-sm"></i>
        </a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        <x-district-card 
            title="Kartoharjo"
            category="Industri"
            count="18"
            rating="4.8"
            description="Sentra industri kecil dan kerajinan tradisional dengan pertumbuhan ekonomi tinggi"
            colorClass="from-blue-500 to-cyan-500"
            icon="fas fa-industry text-blue-500"
            buttonColor="bg-blue-50 hover:bg-blue-100 text-blue-600"
        />
        <x-district-card 
            title="Manguharjo"
            category="Pertanian"
            count="24"
            rating="4.6"
            description="Lahan pertanian subur penghasil padi dan sayuran organik terbesar di kota"
            colorClass="from-green-500 to-emerald-500"
            icon="fas fa-tractor text-green-500"
            buttonColor="bg-green-50 hover:bg-green-100 text-green-600"
        />
        <x-district-card 
            title="Taman"
            category="Pariwisata"
            count="15"
            rating="4.9"
            description="Destinasi wisata budaya dan kuliner dengan daya tarik sejarah yang kental"
            colorClass="from-amber-500 to-orange-500"
            icon="fas fa-umbrella-beach text-amber-500"
            buttonColor="bg-amber-50 hover:bg-amber-100 text-amber-600"
        />
    </div>
</div>