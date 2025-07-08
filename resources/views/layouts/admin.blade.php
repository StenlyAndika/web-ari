<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="icon" href="/img/tablogo.webp">
    <title>{{ $title }}</title>
</head>

<body>
    @if (auth()->user())
        @include('partials.nav')
        <div class="p-4 sm:ml-64 mt-16">
            <div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow">
                @yield('container')
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
