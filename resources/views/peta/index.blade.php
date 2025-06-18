@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-dark mb-2">Peta Potensi Kota Madiun</h1>
                <p class="text-slate-600 max-w-2xl">Eksplorasi potensi ekonomi, sumber daya, dan infrastruktur di seluruh
                    wilayah Kota Madiun secara interaktif</p>
            </div>
        </div>

        <div class="glass-card rounded-2xl overflow-hidden">
            <div id="map" class="w-full h-[600px]"></div>
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
        const map = L.map('map').setView([-7.6295, 111.5231], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap'
        }).addTo(map);

        const kecamatans = @json($kecamatans);

        kecamatans.forEach(kec => {
            try {
                const geojson = typeof kec.geojson === 'string' ? JSON.parse(kec.geojson) : kec.geojson;

                if (!geojson || !geojson.type) {
                    console.warn(`GeoJSON kosong atau tidak valid untuk ${kec.nama}`);
                    return;
                }

                const defaultStyle = {
                    color: kec.color || '#4f46e5',
                    weight: 1.5,
                    fillOpacity: 0.1
                };

                const highlightStyle = {
                    color: kec.color || '#4f46e5', // warna garis saat hover
                    weight: 3,
                    fillOpacity: 0.5
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
                                luas = (area / 1_000_000).toFixed(2);
                            } catch (e) {
                                console.warn('Gagal hitung luas dengan turf:', e);
                                luas = 'Tidak tersedia';
                            }
                        }

                        const tooltipContent = `
                            <div class="text-sm leading-tight">
                                <div><span class="font-medium text-gray-700">Kecamatan:</span> ${district}</div>
                                <div><span class="font-medium text-gray-700">Kelurahan:</span> ${village}</div>
                                <div><span class="font-medium text-gray-700">Luas Wilayah:</span> ${luas} km²</div>
                            </div>
                        `;

                        layer.bindTooltip(tooltipContent, {
                            sticky: true,
                            direction: 'top',
                            className: 'bg-white border-0 shadow-lg rounded p-3 text-left'
                        });

                        // Hover effect
                        layer.on({
                            mouseover: function(e) {
                                e.target.setStyle(highlightStyle);
                                e.target.bringToFront();
                            },
                            mouseout: function(e) {
                                e.target.setStyle(defaultStyle);
                            },
                            click: function() {
                                console.log(`Klik: ${village}, Kecamatan: ${district}`);
                                // redirect onclick sek peta.show belom kwkwkw
                                // window.location.href = `/kelurahan/${slug}`;
                            }
                        });
                    }
                }).addTo(map);
            } catch (e) {
                console.error(`Gagal parsing GeoJSON untuk ${kec.nama}:`, e);
            }
        });

        // Marker pusat kota
        const cityIcon = L.divIcon({
            html: '<div class="w-5 h-5 rounded-full bg-blue-600 flex items-center justify-center text-white animate-pulse"><i class="fas fa-city"></i></div>',
            className: '',
            iconSize: [30, 30]
        });

        L.marker([-7.6295, 111.5231], {
            icon: cityIcon
        }).addTo(map).bindPopup(`
            <div class="font-bold text-blue-600 text-lg">Kota Madiun</div>
            <div class="text-sm">Pusat pemerintahan</div>
        `);

        // Skala peta
        L.control.scale({
            position: 'bottomleft',
            metric: true,
            imperial: false
        }).addTo(map);
    </script>
@endsection
