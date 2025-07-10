<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/img/tablogo.webp">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.datatables.net/2.3.2/css/dataTables.tailwindcss.css" rel="stylesheet" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/css/tom-select.css" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#60B5FF',
                        secondary: '#60B5FF',
                        tertiary: '#FFECDB',
                        accent: '#FF9149',
                        dark: '#1E293B',
                    },
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8fafc;
        }
        [x-cloak] { display: none !important; }
    </style>
</head>

<body>
    @if (auth()->user())
    <div
        x-data="{
            sidebarOpen: true,
            masterDataOpen: false,
            toggleSidebar() {
                this.sidebarOpen = !this.sidebarOpen;
            }
        }"
        x-cloak
        class="min-h-screen flex"
    >
        @include('partials.navigation')
            <!-- Main content -->
            <main class="flex-1 p-6 bg-gray-50">
                @yield('container')
            </main>
            <!-- Sticky Footer -->
            <footer class="bg-gray-50 text-sm text-gray-600 px-6 py-3 text-center mt-auto">
                &copy; 2025 Minimarket Iwel. All rights reserved.
            </footer>
        </div>
    </div>
    @else
        @yield('containerlogin')
    @endif
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.tailwindcss.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/js/tom-select.complete.min.js"></script> --}}
    <script>
        setTimeout(() => {
            const alert = document.getElementById('alertDialog');
            if (alert) {
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 300);
            }
        }, 5000);

        $('#search-table').DataTable({
            responsive: true,
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.7/i18n/id.json",
                zeroRecords: "Data tidak ditemukan",
            }
        });

        // new TomSelect('#id_barang', {
        //     create: false,
        //     sortField: {
        //         field: 'text',
        //         direction: 'asc'
        //     }
        // });

        const hargaInput = document.getElementById('harga');

        hargaInput.addEventListener('input', function (e) {
            let value = this.value.replace(/[^0-9]/g, '');
            if (value) {
                this.value = formatRupiah(value);
            } else {
                this.value = '';
            }
        });

        function formatRupiah(angka) {
            let number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            return 'Rp. ' + rupiah;
        }
    </script>
</body>
