<!-- Modal Toggle -->
<div x-data="{ edit_barang_keluar: false }">
    <!-- Open Button -->
    <button @click="edit_barang_keluar = true" class="px-4 py-2 text-white bg-primary text-sm font-bold rounded hover:bg-blue-700">
        Ubah
    </button>

    <!-- Modal Backdrop -->
    <div
        x-show="edit_barang_keluar"
        x-transition.opacity
        class="fixed inset-0 bg-black bg-opacity-50 z-40"
        @click="edit_barang_keluar = false"
    ></div>

    <!-- Modal Box -->
    <div
        x-show="edit_barang_keluar"
        x-transition
        class="fixed inset-0 flex items-center justify-center z-50"
    >
        <div
            @click.away="edit_barang_keluar = false"
            class="bg-white rounded-lg py-6 w-full max-w-md shadow-lg"
        >
            <h2 class="text-xl font-semibold mb-4 w-full border-l-4 border-emerald-500 pl-4 pr-4 py-2 bg-gray-100">Ubah Data Barang Keluar</h2>
            <form method="post" action="{{ route('admin.barang.keluar.update', $item->id) }}" autocomplete="off" class="space-y-2 px-6">
                @csrf
                @method('put')

                <!-- Id Barang -->
                <div class="relative">
                    <input type="hidden" name="id_barang" value="{{ $item->id_barang }}">
                    @php
                        $barang = \App\Models\Barang::find($item->id_barang);
                    @endphp
                    <input
                        id="nama"
                        name="nama"
                        type="text"
                        value="{{ $barang->nama }}"
                        readonly
                        class="peer w-full border border-gray-300 bg-white px-4 pt-6 pb-2 text-gray-900 rounded-md appearance-none focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                    />
                    <label
                        for="nama"
                        class="absolute left-4 top-2 text-sm text-gray-500 transition-all duration-200
                            peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400
                            peer-focus:top-2 peer-focus:text-sm peer-focus:text-blue-600"
                    >
                        Nama Barang
                    </label>
                </div>

                <!-- Jumlah Barang Keluar -->
                <div class="relative">
                    <input type="hidden" name="jumlah_old" value="{{ $item->jumlah }}">
                    <input
                        id="jumlah"
                        name="jumlah"
                        type="text"
                        value="{{ $item->jumlah }}"
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
                    <button type="button" @click="edit_barang_keluar = false"
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg px-5 py-2.5 text-sm shadow-sm transition">
                        Batal
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
