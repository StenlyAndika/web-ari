@extends('layouts.admin')

@section('container')
    <!-- Total Products Card -->
    <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow border-l-4 border-accent">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-700 text-sm font-medium">Stok Barang</p>
                <p class="text-2xl font-bold text-gray-700 mt-1">1,245</p>
            </div>
            <div class="bg-blue-100 rounded-full p-3">
                <i class="material-icons text-blue-600 text-2xl">inventory</i>
            </div>
        </div>
    </div>

    <!-- Incoming Items Card -->
    <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow border-l-4 border-accent">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-700 text-sm font-medium">Barang Masuk</p>
                <p class="text-2xl font-bold text-gray-700 mt-1">326</p>
            </div>
            <div class="bg-green-100 rounded-full p-3">
                <i class="material-icons text-green-600 text-2xl">input</i>
            </div>
        </div>
    </div>

    <!-- Outgoing Items Card -->
    <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow border-l-4 border-accent">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-700 text-sm font-medium">Barang Keluar</p>
                <p class="text-2xl font-bold text-gray-700 mt-1">189</p>
            </div>
            <div class="bg-orange-100 rounded-full p-3">
                <i class="material-icons text-orange-600 text-2xl">output</i>
            </div>
        </div>
    </div>

    <!-- Categories Card -->
    <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow border-l-4 border-accent">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-700 text-sm font-medium">Total Kategori</p>
                <p class="text-2xl font-bold text-gray-700 mt-1">24</p>
            </div>
            <div class="bg-purple-100 rounded-full p-3">
                <i class="material-icons text-purple-600 text-2xl">category</i>
            </div>
        </div>
    </div>
@endsection
