@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Daftar UMKM Kabupaten Madiun</h1>

    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($umkms as $umkm)
            <a href="#" class="block bg-white shadow hover:shadow-lg transition rounded-lg p-4 border border-gray-100 hover:border-primary group">
                <h2 class="text-lg font-semibold text-gray-800 group-hover:text-primary">{{ $umkm->nama_usaha }}</h2>
                <p class="text-sm text-gray-600 mt-1">{{ $umkm->alamat }}</p>
                <div class="text-xs text-gray-500 mt-2 flex flex-wrap gap-x-2">
                    <span><i class="fas fa-map-marker-alt mr-1"></i> {{ $umkm->kelurahan->nama ?? '-' }}, {{ $umkm->kecamatan->nama ?? '-' }}</span>
                    <span><i class="fas fa-tags mr-1"></i> {{ $umkm->potensi->name ?? $umkm->sektor }}</span>
                </div>
                <div class="mt-2 text-primary text-sm font-medium"><i class="fab fa-whatsapp mr-1"></i>{{ $umkm->kontak }}</div>
            </a>
        @empty
            <p class="col-span-3 text-center text-gray-500">Belum ada data UMKM.</p>
        @endforelse
    </div>
</div>
@endsection

@section('footer')
    <x-footer />
@endsection
