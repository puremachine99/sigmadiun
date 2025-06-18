@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-dark mb-4">Profil Daerah</h1>

        <p class="text-slate-700 leading-relaxed mb-6">{{ $deskripsi }}</p>

        <div class="rounded-xl overflow-hidden shadow border">
            <div id="map" class="w-full h-[350px]"></div>
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
        const map = L.map('map').setView([-7.6295, 111.5231], 10); // Koordinat tengah Kab Madiun

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Optional: Tambahkan marker kecil
        L.marker([-7.6295, 111.5231]).addTo(map)
            .bindPopup('Kabupaten Madiun')
            .openPopup();
    </script>
@endsection
