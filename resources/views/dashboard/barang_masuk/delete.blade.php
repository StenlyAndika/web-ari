<!-- Modal Toggle -->
<div x-data="{ hapus_barang_masuk: false }">
    <!-- Open Button -->
    <button @click="hapus_barang_masuk = true" class="px-4 py-2 text-white bg-red-600 text-sm font-bold rounded hover:bg-red-700">
        Hapus
    </button>

    <!-- Modal Backdrop -->
    <div
        x-show="hapus_barang_masuk"
        x-transition.opacity
        class="fixed inset-0 bg-black bg-opacity-50 z-40"
        @click="hapus_barang_masuk = false"
    ></div>

    <!-- Modal Box -->
    <div
        x-show="hapus_barang_masuk"
        x-transition
        class="fixed inset-0 flex items-center justify-center z-50"
    >
        <div
            @click.away="tambah_barang = false"
            class="bg-white rounded-lg py-6 w-full max-w-md shadow-lg"
        >
            <h2 class="text-xl font-semibold mb-4 w-full border-l-4 border-emerald-500 pl-4 pr-4 py-2 bg-gray-100">Hapus Data Barang Masuk</h2>
            <form method="post" action="{{ route('admin.barang.masuk.destroy', $item->id) }}" autocomplete="off" class="space-y-2 px-6">
                @csrf
                @method('delete')

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

                <!-- Jumlah Barang Masuk -->
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
                        Jumlah Masuk
                    </label>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-3 pt-4 border-t border-gray-200">
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg px-5 py-2.5 text-sm shadow-sm transition">
                        Hapus
                    </button>
                    <button type="button" @click="hapus_barang_masuk = false"
                        class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-lg px-5 py-2.5 text-sm shadow-sm transition">
                        Batal
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
