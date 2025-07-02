@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto p-8 bg-white shadow-md rounded-md text-center mt-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Dashboard</h2>
        <p class="text-gray-600 mb-4">Selamat datang, {{ $user['name'] ?? 'Pengguna' }}</p>
        <p class="text-gray-500">Email: {{ $user['email'] ?? '-' }}</p>

        <div class="mt-6 space-x-4">
            <a href="/" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-md">
                Kembali ke Beranda
            </a>
            <form method="POST" action="{{ route('logout.client') }}" class="inline-block">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-md">
                    Logout
                </button>
            </form>
        </div>
    </div>
@endsection
