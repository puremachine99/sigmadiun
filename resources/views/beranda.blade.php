@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-dark mb-4">Dashboard Potensi Investasi</h1>

        <div class="grid md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-4 rounded shadow">
                <div class="text-gray-500 text-sm">Total Investor</div>
                <div class="text-2xl font-bold">{{ $totalInvestor }}</div>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <div class="text-gray-500 text-sm">Total Investasi</div>
                <div class="text-2xl font-bold">Rp {{ number_format($totalInvestasi, 0, ',', '.') }}</div>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <div class="text-gray-500 text-sm">Total UMKM</div>
                <div class="text-2xl font-bold">
                    {{ $potensis->sum('persentase') > 0 ? $potensis->sum('persentase') . '%' : '0%' }}</div>
            </div>
        </div>

        <div class="bg-white p-6 rounded shadow mb-6">
            <h2 class="text-xl font-semibold mb-4">Sektor Potensi UMKM</h2>
            <div class="space-y-4">
                @foreach ($potensis as $potensi)
                    <div>
                        <div class="flex justify-between text-sm font-medium">
                            <span>{{ $potensi['name'] }}</span>
                            <span>{{ $potensi['persentase'] }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $potensi['persentase'] }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold mb-4">Berita Terkini</h2>
            <ul class="list-disc pl-6 text-gray-700 space-y-2">
                @foreach ($berita as $news)
                    <li>
                        <strong>{{ $news['judul'] }}</strong>
                        <div class="text-sm text-gray-500">{{ $news['tanggal'] }}</div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
@section('footer')
    <x-footer />
@endsection
