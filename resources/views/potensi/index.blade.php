@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Daftar Potensi</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($potensis as $potensi)
                <div class="bg-white p-4 shadow rounded-lg text-center">
                    <a href="{{ route('potensi.show', $potensi) }}"
                        class="block bg-white p-4 shadow rounded-lg text-center hover:shadow-md transition">
                        <div class="text-primary text-4xl mb-3">
                            <i class="fas fa-seedling"></i>
                        </div>
                        <h2 class="text-lg font-semibold text-gray-700">{{ $potensi->name }}</h2>
                        <p class="text-sm text-gray-500 mt-2">{{ $potensi->description ?? 'Belum ada deskripsi.' }}</p>
                    </a>

                </div>
            @empty
                <p class="col-span-4 text-center text-gray-500">Belum ada data potensi.</p>
            @endforelse
        </div>
    </div>
@endsection

@section('footer')
    <x-footer />
@endsection
