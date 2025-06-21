@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-dark mb-6">Profil Daerah</h1>

        <div class="grid grid-cols-1 md:grid-cols-5 gap-6 items-start">
            {{-- Kolom Deskripsi --}}
            <div class="md:col-span-3">
                <p class="text-slate-700 leading-relaxed text-justify">
                    {{ $deskripsi }}
                </p>
            </div>
            {{-- Kolom Map --}}
            <div class="md:col-span-2">
                <div class="rounded-xl overflow-hidden shadow border w-full h-[250px]">
                    <div id="map" class="w-full h-full"></div>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('footer')
    <x-footer />
@endsection
@section('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <script>
        const map = L.map('map').setView([-7.540284, 111.652457], 9); // Koordinat tengah Kab Madiun

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Optional: Tambah marker
        L.marker([-7.540284, 111.652457]).addTo(map)
            .bindPopup('Kabupaten Madiun')
            .openPopup();

        // Load dan tampilkan geojson dari public/geojson/
        fetch('{{ asset('geojson/kabupaten-madiun.geojson') }}')
            .then(response => response.json())
            .then(geojson => {
                L.geoJSON(geojson, {
                    style: {
                        color: "#888888",
                        weight: 2,
                        opacity: 0.4,
                        fillColor: "#555555",
                        fillOpacity: 0.1
                    }
                }).addTo(map);
            })
            .catch(error => {
                console.error('Gagal memuat GeoJSON:', error);
            });
    </script>
@endsection
