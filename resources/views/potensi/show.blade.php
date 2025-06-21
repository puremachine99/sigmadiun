@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-6">

            {{-- Sidebar Potensi --}}
            <aside class="lg:w-1/4 w-full space-y-2">
                <h2 class="text-xl font-semibold text-gray-700 mb-2">Kategori Potensi</h2>
                <div class="space-y-2">
                    @foreach ($potensis as $item)
                        <a href="{{ route('potensi.show', $item->id) }}"
                            class="block text-sm px-4 py-2 rounded-md border transition
                            {{ $item->id == $potensi->id ? 'bg-primary text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                            {{ $item->name }}
                        </a>
                    @endforeach
                </div>
            </aside>

            {{-- Konten Utama --}}
            <main class="flex-1 space-y-6">
                <div class="bg-white shadow rounded-lg p-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                        <h1 class="text-3xl font-bold text-gray-800">{{ $potensi->name }}</h1>
                        <a href="{{ route('home') }}" class="text-primary text-sm hover:underline mt-2 md:mt-0">
                            ← Kembali ke Beranda
                        </a>
                    </div>
                    <div class="text-gray-700 leading-relaxed text-base">
                        {!! nl2br(e($potensi->description ?? 'Belum ada deskripsi.')) !!}
                    </div>
                </div>

                <div class="glass-card rounded-2xl overflow-hidden">
                    <div id="map" class="w-full h-[500px]"></div>
                </div>
            </main>
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
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            const mapEl = document.getElementById('map');
            if (mapEl) mapEl.scrollIntoView({
                behavior: "smooth",
                block: "start"
            });
        });
    </script> --}}

    <script>
        const map = L.map('map').setView([-7.71558,111.54752], 11);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap'
        }).addTo(map);

        const kecamatans = @json($kecamatans);

        kecamatans.forEach(kec => {
            try {
                const geojson = typeof kec.geojson === 'string' ? JSON.parse(kec.geojson) : kec.geojson;

                if (!geojson || !geojson.type) return;

                const defaultStyle = {
                    color: '#888888',
                    weight: 1.2,
                    fillOpacity: 0.05
                };

                const highlightStyle = {
                    color: '#555555',
                    weight: 2,
                    fillOpacity: 0.15
                };


                L.geoJSON(geojson, {
                    style: defaultStyle,
                    onEachFeature: function(feature, layer) {
                        const district = feature.properties?.district || kec.nama;
                        const village = feature.properties?.village || 'Kelurahan tidak diketahui';

                        let luas = feature.properties?.luas;
                        if (!luas) {
                            try {
                                const area = turf.area(feature);
                                luas = (area / 10_000).toFixed(2);
                            } catch (e) {
                                luas = 'Tidak tersedia';
                            }
                        }

                        const tooltipContent = `
                        <div class="text-sm leading-tight">
                            <div><span class="font-medium text-gray-700">Kecamatan:</span> ${district}</div>
                            <div><span class="font-medium text-gray-700">Kelurahan:</span> ${village}</div>
                            <div><span class="font-medium text-gray-700">Luas Wilayah:</span> ${luas} Ha</div>
                        </div>
                    `;

                        layer.bindTooltip(tooltipContent, {
                            sticky: true,
                            direction: 'top',
                            className: 'bg-white border-0 shadow-lg rounded p-3 text-left'
                        });

                        layer.on({
                            mouseover: e => e.target.setStyle(highlightStyle),
                            mouseout: e => e.target.setStyle(defaultStyle),
                            click: () => {
                                console.log(`Klik: ${village}, Kecamatan: ${district}`);
                            }
                        });
                    }
                }).addTo(map);
            } catch (e) {
                console.error(`Gagal parsing GeoJSON untuk ${kec.nama}:`, e);
            }
        });



        // ✅ Tambahkan marker UMKM
        const umkms = @json($umkms);

        umkms.forEach((umkm) => {
            if (umkm.latitude && umkm.longitude) {
                const markerIcon = L.divIcon({
                    html: `<i class="fa-solid fa-map-pin text-red-600 text-xl blink-fade"></i>`,
                    className: '',
                    iconSize: [24, 32],
                    iconAnchor: [12, 32],
                    popupAnchor: [0, -30]
                });



                L.marker([umkm.latitude, umkm.longitude], {
                    icon: markerIcon
                }).addTo(map).bindPopup(`
                <div class="font-semibold text-sm text-gray-800">${umkm.nama_usaha}</div>
            `);
            }
        });

        // Skala peta
        L.control.scale({
            position: 'bottomleft',
            metric: true,
            imperial: false
        }).addTo(map);
    </script>
@endsection
