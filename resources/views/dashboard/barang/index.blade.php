@extends('layouts.admin')

@section('container')
<div class="bg-white w-full rounded-lg shadow-sm border border-gray-200">
    <div id="sticky-banner" tabindex="-1" class="w-full border-l-4 bg-gray-100 border-accent pl-4 pr-4 my-6">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <h1 class="text-2xl font-semibold text-gray-900">{{ $title }}</h1>
            @include('dashboard.barang.add')
        </div>
    </div>

    @if (session('toast_success'))
        <div id="alertDialog" class="flex w-full max-w-xs bg-white rounded-lg shadow-md fixed bottom-5 right-5" role="alert">
            <div class="inline-flex items-center justify-center w-12 bg-emerald-500 rounded-l-lg">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                </svg>
            </div>
            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-emerald-500">Success</span>
                    <p class="text-sm text-gray-600">{{ session('toast_success') }}</p>
                </div>
            </div>
        </div>
    @endif
    @if (session('toast_error'))
        <div id="alertDialog" class="flex w-full max-w-xs bg-white rounded-lg shadow-md fixed bottom-5 right-5" role="alert">
            <div class="inline-flex items-center justify-center w-12 bg-red-500 rounded-l-lg">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z" />
                </svg>
            </div>
            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-red-500">Error</span>
                    <p class="text-sm text-gray-600">{{ session('toast_error') }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-xl shadow-md px-6 pb-6">
    <table id="search-table" class="min-w-full text-sm text-left text-gray-700">
        <thead class="bg-gray-100 text-xs uppercase text-gray-600">
            <tr>
                <th class="px-6 py-4">No</th>
                <th class="px-6 py-4">Nama Barang</th>
                <th class="px-6 py-4">Satuan</th>
                <th class="px-6 py-4">Harga</th>
                <th class="px-6 py-4">Stok</th>
                <th class="px-6 py-4">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $item)
                <tr>
                    <td class="px-6 py-3 font-medium text-gray-900">{{ $loop->iteration }}</td>
                    <td class="px-6 py-3">{{ $item->nama }}</td>
                    <td class="px-6 py-3">{{ $item->satuan }}</td>
                    <td class="px-6 py-3">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td class="px-6 py-3">{{ $item->stok }}</td>
                    <td class="px-6 py-3">
                        <div class="flex space-x-2">
                            <a href="#" class="text-blue-600 hover:underline">Edit</a>
                            <a href="#" class="text-red-600 hover:underline">Delete</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


</div>
@endsection
