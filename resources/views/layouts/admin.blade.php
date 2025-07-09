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
            profileOpen: false,
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
                <!-- Dashboard Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    @yield('container')
                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
        if ($('#search-table').length) {
            new simpleDatatables.DataTable('#search-table', {
                searchable: true
            });
        }
        if ($('#default-table').length) {
            new simpleDatatables.DataTable('#default-table', {
                searchable: false,
                paging: false,
                footer: false
            });
        }
    </script>
</body>
