@extends('layouts.app')
<style>
    .filter-btn {
        @apply px-4 py-2 rounded-full text-sm font-medium transition-all;
        background-color: #f1f5f9;
        color: #334155;
        border: 1px solid #e2e8f0;
    }

    .filter-btn:hover,
    .filter-btn.active {
        @apply bg-blue-600 text-white border-blue-600;
    }

    .custom-tooltip {
        background: white;
        border-radius: 8px;
        padding: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        border: 1px solid #e2e8f0;
        min-width: 250px;
    }

    .custom-tooltip h3 {
        @apply text-lg font-bold text-blue-900 mb-2 pb-2 border-b border-blue-100;
    }

    .custom-tooltip .detail {
        @apply flex justify-between py-1 text-sm;
    }

    .custom-tooltip .label {
        @apply text-slate-600 font-medium;
    }

    .custom-tooltip .value {
        @apply text-blue-800 font-semibold;
    }

    .custom-tooltip .action-btn {
        @apply mt-3 w-full py-2 rounded-lg bg-blue-50 text-blue-700 font-medium text-center hover:bg-blue-100 transition-colors;
    }
</style>

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-blue-900 mb-2">Peta Potensi Kota Madiun</h1>
                <p class="text-slate-700 max-w-2xl">Eksplorasi potensi ekonomi, sumber daya, dan infrastruktur di seluruh
                    wilayah Kota Madiun secara interaktif</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <!-- Filter Section -->
            <div class="p-5 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-gray-200">
                <div class="flex flex-col md:flex-row gap-4 items-start md:items-center">
                    <div class="flex-1">
                        <h2 class="text-lg font-semibold text-blue-800 mb-2">Filter Potensi</h2>
                        <div class="flex flex-wrap gap-3">
                            <button class="filter-btn active" data-filter="all">Semua</button>
                            <button class="filter-btn" data-filter="umkm">UMKM</button>
                            <button class="filter-btn" data-filter="industri">Industri</button>
                            <button class="filter-btn" data-filter="pertanian">Pertanian</button>
                            <button class="filter-btn" data-filter="wisata">Wisata</button>
                            <button class="filter-btn" data-filter="infrastruktur">Infrastruktur</button>
                        </div>
                    </div>

                    <div class="w-full md:w-auto">
                        <label for="kecamatanFilter" class="block text-sm font-medium text-blue-800 mb-1">Filter
                            Kecamatan</label>
                        <select id="kecamatanFilter"
                            class="w-full md:w-60 rounded-lg border border-blue-200 bg-white py-2 px-3 text-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <option value="all">Semua Kecamatan</option>
                            @foreach ($kecamatans as $kec)
                                <option value="{{ $kec->id }}">{{ $kec->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Map Container -->
            <div class="glass-card rounded-xl overflow-hidden">
                <div id="map" class="w-full h-[600px]"></div>
            </div>
        </div>

        <!-- Legend -->
        <div class="mt-6 bg-white rounded-xl shadow-md p-5">
            <h3 class="text-lg font-semibold text-blue-800 mb-3">Legenda Peta</h3>
            <div class="flex flex-wrap gap-4">
                <div class="flex items-center">
                    <div class="w-4 h-4 rounded-full bg-blue-600 mr-2"></div>
                    <span class="text-sm">Pusat Kota</span>
                </div>
                <div class="flex items-center">
                    <div class="w-4 h-4 rounded-full bg-green-500 mr-2"></div>
                    <span class="text-sm">Pertanian</span>
                </div>
                <div class="flex items-center">
                    <div class="w-4 h-4 rounded-full bg-yellow-500 mr-2"></div>
                    <span class="text-sm">Industri</span>
                </div>
                <div class="flex items-center">
                    <div class="w-4 h-4 rounded-full bg-purple-500 mr-2"></div>
                    <span class="text-sm">Wisata</span>
                </div>
                <div class="flex items-center">
                    <div class="w-4 h-4 rounded-full bg-red-500 mr-2"></div>
                    <span class="text-sm">Infrastruktur</span>
                </div>
                <div class="flex items-center">
                    <div class="w-4 h-4 rounded-full bg-teal-500 mr-2"></div>
                    <span class="text-sm">UMKM</span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <x-footer />
@endsection

@section('scripts')
    {{-- Leaflet -render map --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    {{-- Turf.js - analisis spasial --}}
    <script src="https://cdn.jsdelivr.net/npm/@turf/turf@6.5.0/turf.min.js"></script>

    <script>
        // potensiData
        const potensiData = [{
                id: 1,
                type: 'umkm',
                nama: "Sentra Kerajinan Bambu",
                kecamatan: "Taman",
                kelurahan: "Madiun Lor",
                lat: -7.620,
                lng: 111.525,
                luas: "5.2",
                deskripsi: "Sentra kerajinan bambu dengan 50 pengrajin aktif"
            },
            {
                id: 2,
                type: 'industri',
                nama: "Kawasan Industri Balerejo",
                kecamatan: "Mangu Harjo",
                kelurahan: "Balerejo",
                lat: -7.635,
                lng: 111.515,
                luas: "120",
                deskripsi: "Kawasan industri terpadu dengan fasilitas lengkap"
            },
            {
                id: 3,
                type: 'pertanian',
                nama: "Lahan Pertanian Organik",
                kecamatan: "Kartoharjo",
                kelurahan: "Kartoharjo",
                lat: -7.615,
                lng: 111.535,
                luas: "85",
                deskripsi: "Pertanian organik sayur dan buah-buahan"
            },
            {
                id: 4,
                type: 'wisata',
                nama: "Taman Rekreasi Wilis",
                kecamatan: "Taman",
                kelurahan: "Nambangan Kidul",
                lat: -7.625,
                lng: 111.510,
                luas: "12.5",
                deskripsi: "Taman rekreasi keluarga dengan fasilitas lengkap"
            },
            {
                id: 5,
                type: 'infrastruktur',
                nama: "PLTU Madiun",
                kecamatan: "Mangu Harjo",
                kelurahan: "Madiun Kidul",
                lat: -7.645,
                lng: 111.505,
                luas: "8.7",
                deskripsi: "Pembangkit Listrik Tenaga Uap kapasitas 200MW"
            },
            {
                id: 6,
                type: 'umkm',
                nama: "Sentra Batik Madiun",
                kecamatan: "Kartoharjo",
                kelurahan: "Pangongangan",
                lat: -7.605,
                lng: 111.545,
                luas: "3.8",
                deskripsi: "Sentra produksi batik khas Madiun"
            },
            {
                id: 7,
                type: 'pertanian',
                nama: "Perkebunan Jeruk Pameling",
                kecamatan: "Taman",
                kelurahan: "Pandean",
                lat: -7.630,
                lng: 111.550,
                luas: "65",
                deskripsi: "Perkebunan jeruk varietas unggul"
            }
        ];

        // map init
        const map = L.map('map').setView([-7.577905, 111.668270], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap'
        }).addTo(map);

        // =======================
        // 🧠 PETA LAYER GROUP
        // =======================
        const kecamatanLayers = {};
        const potensiLayers = {};
        const markerGroups = {
            all: L.layerGroup(),
            umkm: L.layerGroup(),
            industri: L.layerGroup(),
            pertanian: L.layerGroup(),
            wisata: L.layerGroup(),
            infrastruktur: L.layerGroup()
        };
        Object.values(markerGroups).forEach(group => group.addTo(map));

        // icon
        function getIconForType(type) {
            const colors = {
                umkm: 'teal',
                industri: 'yellow',
                pertanian: 'green',
                wisata: 'purple',
                infrastruktur: 'red'
            };
            const iconColor = colors[type] || 'blue';

            return L.divIcon({
                className: 'custom-marker',
                html: `<div class="w-6 h-6 rounded-full bg-${iconColor}-500 flex items-center justify-center text-white shadow-lg border-2 border-white">
                    <i class="fas ${type === 'umkm' ? 'fa-store' : type === 'industri' ? 'fa-industry' : type === 'pertanian' ? 'fa-tractor' : type === 'wisata' ? 'fa-camera' : 'fa-road'} text-xs"></i>
                </div>`,
                iconSize: [24, 24],
                iconAnchor: [12, 12]
            });
        }

        // marker potensi
        potensiData.forEach(potensi => {
            const marker = L.marker([potensi.lat, potensi.lng], {
                icon: getIconForType(potensi.type)
            }).addTo(markerGroups.all).addTo(markerGroups[potensi.type]);

            const tooltip = `
            <div class="custom-tooltip">
                <h3>${potensi.nama}</h3>
                <div class="detail"><span class="label">Jenis:</span><span class="value capitalize">${potensi.type}</span></div>
                <div class="detail"><span class="label">Kecamatan:</span><span class="value">${potensi.kecamatan}</span></div>
                <div class="detail"><span class="label">Kelurahan:</span><span class="value">${potensi.kelurahan}</span></div>
                <div class="detail"><span class="label">Luas:</span><span class="value">${potensi.luas} Ha</span></div>
                <p class="mt-2 text-sm text-gray-600">${potensi.deskripsi}</p>
                <a href="#" class="action-btn">Lihat Detail Potensi</a>
            </div>
        `;

            marker.bindTooltip(tooltip, {
                direction: 'top',
                className: '!bg-transparent !border-0 !shadow-none'
            });

            potensiLayers[potensi.id] = marker;
        });

        // =======================
        // 🗺️ RENDER GEOJSON KECAMATAN
        // =======================
        const kecamatans = @json($kecamatans);

        kecamatans.forEach(kec => {
            try {
                const geojson = typeof kec.geojson === 'string' ? JSON.parse(kec.geojson) : kec.geojson;
                if (!geojson || !geojson.type) return;

                const defaultStyle = {
                    color: '#4f46e5',
                    weight: 1.5,
                    fillOpacity: 0.1
                };

                const highlightStyle = {
                    color: '#4f46e5',
                    weight: 3,
                    fillOpacity: 0.3
                };

                const layer = L.geoJSON(geojson, {
                    style: defaultStyle,
                    onEachFeature: function(feature, layer) {
                        const district = feature.properties?.district || kec.nama;
                        const village = feature.properties?.village || '-';
                        let luas = feature.properties?.luas;

                        if (!luas) {
                            try {
                                const area = turf.area(feature);
                                luas = (area / 10000).toFixed(2);
                            } catch {
                                luas = 'N/A';
                            }
                        }

                        const tooltipContent = `
                        <div class="custom-tooltip">
                            <h3>${district}</h3>
                            <div class="detail"><span class="label">Kelurahan:</span><span class="value">${village}</span></div>
                            <div class="detail"><span class="label">Luas:</span><span class="value">${luas} Ha</span></div>
                            <div class="detail"><span class="label">Potensi:</span><span class="value">${kec.potensi || 'Pertanian, UMKM'}</span></div>
                            <a href="#" class="action-btn">Lihat Detail</a>
                        </div>
                    `;

                        layer.bindTooltip(tooltipContent, {
                            sticky: true,
                            direction: 'top',
                            className: '!bg-transparent !border-0 !shadow-none'
                        });

                        layer.on({
                            mouseover: e => e.target.setStyle(highlightStyle),
                            mouseout: e => e.target.setStyle(defaultStyle),
                            click: () => map.fitBounds(layer.getBounds())
                        });
                    }
                }).addTo(map);

                kecamatanLayers[kec.id] = layer;
            } catch (e) {
                console.error(`Gagal parsing geojson untuk ${kec.nama}:`, e);
            }
        });

        // =======================
        // 🧭 PUSAT KOTA MARKER
        // =======================
        const cityIcon = L.divIcon({
            html: '<div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white animate-pulse shadow-lg"><i class="fas fa-city"></i></div>',
            iconSize: [32, 32],
            iconAnchor: [16, 16]
        });

        L.marker([-7.6295, 111.5231], {
            icon: cityIcon,
            zIndexOffset: 1000
        }).addTo(map).bindPopup(`
        <div class="custom-tooltip">
            <h3>Pusat Kota Madiun</h3>
            <div class="detail"><span class="label">Fungsi:</span><span class="value">Pusat Pemerintahan</span></div>
            <div class="detail"><span class="label">Luas:</span><span class="value">15.2 Km²</span></div>
            <p class="mt-2 text-sm text-gray-600">Pusat pemerintahan dan aktivitas ekonomi utama Kota Madiun</p>
        </div>
    `);

        // =======================
        // 🔃 FILTER: JENIS POTENSI
        // =======================
        document.querySelectorAll('.filter-btn').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                const filter = this.dataset.filter;

                Object.values(markerGroups).forEach(group => group.remove());
                if (filter === 'all') {
                    Object.values(markerGroups).forEach(group => group.addTo(map));
                } else {
                    markerGroups[filter]?.addTo(map);
                }
            });
        });

        // =======================
        // 🔃 FILTER: KECAMATAN
        // =======================
        document.getElementById('kecamatanFilter').addEventListener('change', function() {
            const kecamatanId = this.value;
            Object.values(kecamatanLayers).forEach(layer => layer.setStyle({
                fillOpacity: 0.1,
                weight: 1.5
            }));
            if (kecamatanId !== 'all' && kecamatanLayers[kecamatanId]) {
                kecamatanLayers[kecamatanId].setStyle({
                    fillOpacity: 0.4,
                    weight: 3
                });
                kecamatanLayers[kecamatanId].bringToFront();
                map.fitBounds(kecamatanLayers[kecamatanId].getBounds());
            }
        });

        // =======================
        // 📏 SKALA PETA
        // =======================
        L.control.scale({
            position: 'bottomleft',
            metric: true,
            imperial: false
        }).addTo(map);
    </script>
@endsection
