@extends('layouts.admin')

@section('container')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        @if (session('toast_success'))
            <div id="alertDialog" class="flex w-full max-w-xs bg-white rounded-lg shadow-md fixed bottom-5 right-5" role="alert">
                <div class="inline-flex items-center justify-center w-12 bg-emerald-500 rounded-l-lg">
                    <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                    </svg>
                </div>
                <div class="px-4 py-2 -mx-3">
                    <div class="mx-3">
                        <span class="font-semibold text-emerald-500 dark:text-emerald-400">Success</span>
                        <p class="text-sm text-gray-600 dark:text-gray-200">{{ session('toast_success') }}</p>
                    </div>
                </div>
            </div>
        @endif
        <!-- Total Products Card -->
        <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow border-l-4 border-emerald-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-700 text-sm font-medium">Total Barang</p>
                    <p class="text-2xl font-bold text-gray-700 mt-1">{{ $total_barang }}</p>
                </div>
                <div class="bg-blue-100 rounded-full p-3">
                    <i class="material-icons text-blue-600 text-2xl">inventory</i>
                </div>
            </div>
        </div>

        <!-- Incoming Items Card -->
        <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow border-l-4 border-emerald-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-700 text-sm font-medium">Barang Masuk</p>
                    <p class="text-2xl font-bold text-gray-700 mt-1">{{ $total_barang_masuk }}</p>
                </div>
                <div class="bg-green-100 rounded-full p-3">
                    <i class="material-icons text-green-600 text-2xl">input</i>
                </div>
            </div>
        </div>

        <!-- Outgoing Items Card -->
        <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow border-l-4 border-emerald-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-700 text-sm font-medium">Barang Keluar</p>
                    <p class="text-2xl font-bold text-gray-700 mt-1">{{ $total_barang_keluar }}</p>
                </div>
                <div class="bg-orange-100 rounded-full p-3">
                    <i class="material-icons text-orange-600 text-2xl">output</i>
                </div>
            </div>
        </div>
    </div>
@endsection
