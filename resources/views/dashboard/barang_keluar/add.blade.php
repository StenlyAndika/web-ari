<!-- Modal Toggle -->
<div x-data="{ tambah_barang_keluar: false }">
    <!-- Open Button -->
    <button @click="tambah_barang_keluar = true" class="px-4 py-2 text-white bg-emerald-500 text-sm font-bold rounded hover:bg-blue-700">
        Data Baru
    </button>

    <!-- Modal Backdrop -->
    <div
        x-show="tambah_barang_keluar"
        x-transition.opacity
        class="fixed inset-0 bg-black bg-opacity-50 z-40"
        @click="tambah_barang_keluar = false"
    ></div>

    <!-- Modal Box -->
    <div
        x-show="tambah_barang_keluar"
        x-transition
        class="fixed inset-0 flex items-center justify-center z-50"
    >
        <div
            @click.away="tambah_barang_keluar = false"
            class="bg-white rounded-lg py-6 w-full max-w-md shadow-lg"
        >
            <h2 class="text-xl font-semibold mb-4 w-full border-l-4 border-emerald-500 pl-4 pr-4 py-2 bg-gray-100">Barang Keluar</h2>
            <form method="post" action="{{ route('admin.barang.keluar.store') }}" autocomplete="off" class="space-y-2 px-6">
                @csrf

                <!-- Id Barang -->
                <div class="relative">
                    <select
                        id="id_barang"
                        name="id_barang"
                        required
                        class="peer w-full border border-gray-300 bg-white px-4 pt-6 pb-2 text-gray-900 rounded-md appearance-none focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                    >
                        <option disabled selected value="">-- Pilih --</option>
                        @foreach ($barang as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    <label
                        for="id_barang"
                        class="absolute left-4 top-2 text-sm text-gray-500 transition-all duration-200
                            peer-focus:top-2 peer-focus:text-sm peer-focus:text-blue-600
                            peer-valid:top-2 peer-valid:text-sm peer-valid:text-blue-600
                            peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400"
                    >
                        Nama Barang
                    </label>
                </div>

                <!-- Jumlah Barang Keluar -->
                <div class="relative">
                    <input
                        id="jumlah"
                        name="jumlah"
                        type="text"
                        placeholder=" "
                        required
                        class="peer w-full border border-gray-300 bg-white px-4 pt-6 pb-2 text-gray-900 rounded-md appearance-none focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                    />
                    <label
                        for="jumlah"
                        class="absolute left-4 top-2 text-sm text-gray-500 transition-all duration-200
                            peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400
                            peer-focus:top-2 peer-focus:text-sm peer-focus:text-blue-600"
                    >
                        Jumlah Keluar
                    </label>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-3 pt-4 border-t border-gray-200">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg px-5 py-2.5 text-sm shadow-sm transition">
                        Simpan
                    </button>
                    <button type="button" @click="tambah_barang_keluar = false"
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg px-5 py-2.5 text-sm shadow-sm transition">
                        Batal
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
