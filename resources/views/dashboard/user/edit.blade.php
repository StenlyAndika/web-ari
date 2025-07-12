<!-- Modal Toggle -->
<div x-data="{ edit_user: false }">
    <!-- Open Button -->
    <button @click="edit_user = true" class="px-4 py-2 text-white bg-primary text-sm font-bold rounded hover:bg-blue-700">
        Ubah
    </button>

    <!-- Modal Backdrop -->
    <div
        x-show="edit_user"
        x-transition.opacity
        class="fixed inset-0 bg-black bg-opacity-50 z-40"
        @click="edit_user = false"
    ></div>

    <!-- Modal Box -->
    <div
        x-show="edit_user"
        x-transition
        class="fixed inset-0 flex items-center justify-center z-50"
    >
        <div
            @click.away="edit_user = false"
            class="bg-white rounded-lg py-6 w-full max-w-md shadow-lg"
        >
            <h2 class="text-xl font-semibold mb-4 w-full border-l-4 border-emerald-500 pl-4 pr-4 py-2 bg-gray-100">Ubah Data User</h2>
            <form method="post" action="{{ route('admin.user.update', $item->id) }}" autocomplete="off" class="space-y-2 px-6">
                @csrf
                @method('put')

                <!-- Nama Barang -->
                <div class="relative">
                    <input
                        id="nama"
                        name="nama"
                        type="text"
                        value="{{ $item->nama }}"
                        required
                        class="peer w-full border border-gray-300 bg-white px-4 pt-6 pb-2 text-gray-900 rounded-md appearance-none focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                    />
                    <label
                        for="nama"
                        class="absolute left-4 top-2 text-sm text-gray-500 transition-all duration-200
                            peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400
                            peer-focus:top-2 peer-focus:text-sm peer-focus:text-blue-600"
                    >
                        Nama
                    </label>
                </div>

                <div class="relative">
                    <input
                        id="username"
                        name="username"
                        type="text"
                        value="{{ $item->username }}"
                        required
                        class="peer w-full border border-gray-300 bg-white px-4 pt-6 pb-2 text-gray-900 rounded-md appearance-none focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                    />
                    <label
                        for="username"
                        class="absolute left-4 top-2 text-sm text-gray-500 transition-all duration-200
                            peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400
                            peer-focus:top-2 peer-focus:text-sm peer-focus:text-blue-600"
                    >
                        Username
                    </label>
                </div>

                <div class="relative">
                    <input
                        id="password"
                        name="password"
                        type="text"
                        value=""
                        class="peer w-full border border-gray-300 bg-white px-4 pt-6 pb-2 text-gray-900 rounded-md appearance-none focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                    />
                    <label
                        for="password"
                        class="absolute left-4 top-2 text-sm text-gray-500 transition-all duration-200
                            peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400
                            peer-focus:top-2 peer-focus:text-sm peer-focus:text-blue-600"
                    >
                        Password
                    </label>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-3 pt-4 border-t border-gray-200">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg px-5 py-2.5 text-sm shadow-sm transition">
                        Simpan
                    </button>
                    <button type="button" @click="edit_user = false"
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg px-5 py-2.5 text-sm shadow-sm transition">
                        Batal
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
