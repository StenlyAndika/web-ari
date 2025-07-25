<aside
    x-show="sidebarOpen"
    x-transition:enter="transition ease-in-out duration-300"
    x-transition:enter-start="-translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in-out duration-300"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full"
    class="fixed inset-y-0 left-0 z-30 bg-white shadow-lg w-[250px] border-r border-gray-200"
>
    <!-- Brand Logo -->
    <div class="bg-primary px-6 py-4 flex items-center justify-between">
        <div class="flex items-center">
            <div class="w-8 h-8 rounded bg-white flex items-center justify-center mr-3">
                <i class="material-icons text-primary">shopping_cart</i>
            </div>
            <h2 class="text-white text-lg font-semibold">Toko Iwel</h2>
        </div>
    </div>

    <!-- User Profile -->
    <div class="bg-gray-50 px-6 py-4 flex items-center border-b border-gray-200">
        <div class="bg-primary rounded-full w-10 h-10 flex items-center justify-center">
            <i class="material-icons text-white text-lg">person</i>
        </div>
        <div class="ml-3">
            <h3 class="font-medium text-gray-700 text-sm">{{ auth()->user()->nama }}</h3>
            <p class="text-gray-700 text-xs">Administrator</p>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="mt-2">
        <ul class="space-y-1 px-3">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-3 py-2 rounded-md cursor-pointer text-gray-700 font-medium text-sm transition-colors {{ Request::is('dashboard') ? 'bg-primary text-white' : 'bg-white text-gray-700 hover:bg-emerald-50 hover:text-emerald-500' }}">
                    <i class="material-icons mr-3 text-lg">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>
            @can('admin')
            <li x-data="{ masterDataOpen: {{ Request::is('admin/master*') ? 'true' : 'false' }} }">
                <div
                    @click="masterDataOpen = !masterDataOpen"
                    class="flex items-center px-3 py-2 rounded-md hover:bg-emerald-50 hover:text-emerald-500 cursor-pointer text-gray-700 font-medium text-sm transition-colors bg-white text-gray-700"
                >
                    <i class="material-icons mr-3 text-lg">folder</i>
                    <span>Data Master</span>
                    <i
                        class="material-icons ml-auto text-lg transition-transform duration-200"
                        :class="{'rotate-180': masterDataOpen}"
                        x-text="masterDataOpen ? 'expand_less' : 'expand_more'"
                    ></i>
                </div>
                <div
                    x-show="masterDataOpen"
                    x-collapse
                    class="ml-6 mt-1 space-y-1"
                >
                    <a href="{{ route('admin.barang.index') }}" class="flex items-center px-3 py-2 rounded-md cursor-pointer text-gray-700 font-medium text-sm transition-colors {{ Request::is('admin/master/barang*') ? 'bg-primary text-white' : 'bg-white text-gray-700 hover:bg-emerald-50 hover:text-emerald-500' }}">
                        <i class="material-icons mr-3 text-base">description</i>
                        Data Barang
                    </a>
                    <a href="{{ route('admin.supplier.index') }}" class="flex items-center px-3 py-2 rounded-md cursor-pointer text-gray-700 font-medium text-sm transition-colors {{ Request::is('admin/master/supplier*') ? 'bg-primary text-white' : 'bg-white text-gray-700 hover:bg-emerald-50 hover:text-emerald-500' }}">
                        <i class="material-icons mr-3 text-base">description</i>
                        Data Supplier
                    </a>
                    <a href="{{ route('admin.user.index') }}" class="flex items-center px-3 py-2 rounded-md cursor-pointer text-gray-700 font-medium text-sm transition-colors {{ Request::is('admin/master/user*') ? 'bg-primary text-white' : 'bg-white text-gray-700 hover:bg-emerald-50 hover:text-emerald-500' }}">
                        <i class="material-icons mr-3 text-base">description</i>
                        Data User
                    </a>
                </div>
            </li>

            <li x-data="{ laporanDataOpen: {{ Request::is('admin/laporan*') ? 'true' : 'false' }} }">
                <div
                    @click="laporanDataOpen=!laporanDataOpen"
                    class="flex items-center px-3 py-2 rounded-md hover:bg-emerald-50 hover:text-emerald-500 cursor-pointer text-gray-700 font-medium text-sm transition-colors bg-white text-gray-700"
                >
                    <i class="material-icons mr-3 text-lg">folder</i>
                    <span>Data Laporan</span>
                    <i
                        class="material-icons ml-auto text-lg transition-transform duration-200"
                        :class="{'rotate-180': laporanDataOpen}"
                        x-text="laporanDataOpen ? 'expand_less' : 'expand_more'"
                    ></i>
                </div>
                <div
                    x-show="laporanDataOpen"
                    x-collapse
                    class="ml-6 mt-1 space-y-1"
                >
                    <a href="{{ route('admin.laporan.stok') }}" class="flex items-center px-3 py-2 rounded-md cursor-pointer text-gray-700 font-medium text-sm transition-colors {{ Request::is('admin/laporan/stok*') ? 'bg-primary text-white' : 'bg-white text-gray-700 hover:bg-emerald-50 hover:text-emerald-500' }}">
                        <i class="material-icons mr-3 text-base">description</i>
                        Laporan Stok Barang
                    </a>
                    <a href="{{ route('admin.laporan.masuk') }}" class="flex items-center px-3 py-2 rounded-md cursor-pointer text-gray-700 font-medium text-sm transition-colors {{ Request::is('admin/laporan/masuk*') ? 'bg-primary text-white' : 'bg-white text-gray-700 hover:bg-emerald-50 hover:text-emerald-500' }}">
                        <i class="material-icons mr-3 text-base">description</i>
                        Laporan Barang Masuk
                    </a>
                    <a href="{{ route('admin.laporan.keluar') }}" class="flex items-center px-3 py-2 rounded-md cursor-pointer text-gray-700 font-medium text-sm transition-colors {{ Request::is('admin/laporan/keluar*') ? 'bg-primary text-white' : 'bg-white text-gray-700 hover:bg-emerald-50 hover:text-emerald-500' }}">
                        <i class="material-icons mr-3 text-base">description</i>
                        Laporan Barang Keluar
                    </a>
                </div>
            </li>
            @endcan
            <li>
                <a href="{{ route('admin.barang.masuk.index') }}" class="flex items-center px-3 py-2 rounded-md cursor-pointer text-gray-700 font-medium text-sm transition-colors {{ Request::is('admin/barang/masuk') ? 'bg-primary text-white' : 'bg-white text-gray-700 hover:bg-emerald-50 hover:text-emerald-500' }}">
                    <i class="material-icons mr-3 text-lg">edit_document</i>
                    <span>Data Barang Masuk</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.barang.keluar.index') }}" class="flex items-center px-3 py-2 rounded-md cursor-pointer text-gray-700 font-medium text-sm transition-colors {{ Request::is('admin/barang/keluar') ? 'bg-primary text-white' : 'bg-white text-gray-700 hover:bg-emerald-50 hover:text-emerald-500' }}">
                    <i class="material-icons mr-3 text-lg">content_paste_go</i>
                    <span>Data Barang Keluar</span>
                </a>
            </li>
            <li class="pt-4 border-t border-gray-200 mt-4">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="w-full flex items-center px-3 py-2 rounded-md hover:bg-red-50 hover:text-red-600 text-gray-700 font-medium text-sm transition-colors">
                        <i class="material-icons mr-3 text-lg">exit_to_app</i>
                        <span>Logout</span>
                    </a>
                </form>
            </li>
        </ul>
    </nav>
</aside>

<!-- Content wrapper -->
<div
    class="flex-1 flex flex-col min-h-screen transition-all duration-300"
    :class="sidebarOpen ? 'ml-[250px]' : 'ml-0'"
>
    <!-- Topbar -->
    <header class="bg-white shadow-sm flex justify-between items-center h-16 px-6 sticky top-0 z-20 border-b border-gray-200">
        <div class="flex items-center">
            <button @click="toggleSidebar"
                    class="p-2 text-gray-700 hover:bg-gray-100 rounded-md focus:outline-none mr-4 transition-colors">
                <i class="material-icons">menu</i>
            </button>
            <h1 class="text-lg font-semibold text-gray-700">Dashboard</h1>
        </div>
    </header>
