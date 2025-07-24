@extends('layouts.admin')

@section('container')
    <div class="bg-white w-full rounded-lg shadow-sm border border-gray-200">
        <div id="sticky-banner" tabindex="-1" class="w-full border-l-4 bg-gray-100 border-emerald-500 pl-4 pr-4 my-6">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div class="flex py-4 px-2">
                    <p class="text-gray-600 dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                    </p>

                    <span class="mx-5 text-gray-500 dark:text-gray-300 rtl:-scale-x-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>

                    <p class="flex items-center text-gray-600 -px-2">
                        <span class="mx-2">Laporan</span>
                    </p>

                    <span class="mx-5 text-gray-500 dark:text-gray-300 rtl:-scale-x-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>

                    <p class="flex items-center text-gray-600 -px-2">
                        <span class="mx-2">Laporan Stok Barang</span>
                    </p>
                </div>
            </div>
        </div>

        <form method="GET" action="{{ route('admin.laporan.stok') }}" class="px-6">
        <div class="relative w-full">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </div>
            <input id="monthPicker"
                name="monthPicker" type="text" value="{{ request('monthPicker') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                placeholder="Pilih Tanggal">
        </div>
        <div class="flex space-x-1">
            <button type="submit"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center mt-2 mb-4">
                Cari Data
            </button>
            <a href="{{ route('admin.laporan.stok.print', ['bln' => $bln]) }}"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center mt-2 mb-4">
                Cetak Laporan
            </a>
        </div>
    </form>

        <h1 class="text-xl font-semibold text-gray-700 px-6 text-center">Laporan Stok Barang</h1>
        <h1 class="text-xl font-semibold text-gray-700 px-6 text-center">Toko Iwel</h1>
        <h3 class="text-md font-semibold text-gray-700 px-6 ">Bulan : {{ Carbon\Carbon::parse($bln)->translatedFormat('F Y') }}</h3>
        <div class="overflow-x-auto bg-white rounded-xl shadow-md px-6 pb-6">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                    <tr>
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Nama Barang</th>
                        <th class="px-6 py-4">Stok Barang</th>
                        <th class="px-6 py-4">Tanggal update</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $item)
                        <tr>
                            <td class="px-6 py-3 font-medium text-gray-900">{{ $loop->iteration }}</td>
                            <td class="px-6 py-3">{{ $item->nama }}</td>
                            <td class="px-6 py-3">{{ $item->stok . ' ' . $item->satuan }}</td>
                            <td class="px-6 py-3">{{ $item->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
