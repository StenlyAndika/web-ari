<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif
            font-size: 12px !important;
        }

        .table-body {
            width: 100%;
            border-collapse: collapse;
            /* Ensures that borders are not doubled */
        }

        .table-body th,
        .table-body td {
            border: 1px solid black;
        }

        .table-body th,
        .table-body td {
            padding: 8px;
            text-align: left;
        }

        .kopsurat {
            width: 100%;
            align-content: left;
        }

        .kop {
            border-bottom : 5px solid #000;
            padding: 2px;
            text-align: center;
            width: 100%;
        }

        .tengah {
            text-align : center;
            line-height: 5px;
        }

    </style>
</head>

<body>
    <div class="kopsurat">
        <table class="kop">
            <tr>
                {{-- <td><img src="img/tablogo.png" width="140px"></td> --}}
                <td class="tengah">
                    <h3>MINIMARKET IWEL</h3>
                    <h3>LAPORAN BARANG KELUAR</h3>
                </td>
                {{-- <td><img src="img/tablogo2.png" width="140px"></td> --}}
            </tr>
        </table>
    </div>
    <div>
        <h5>BULAN : {{ Carbon\Carbon::parse($bln)->translatedFormat('F Y') }}</h5>
        <h5>TANGGAL CETAK LAPORAN : {{ Carbon\Carbon::now()->translatedFormat('d F Y') }}</h5>
        <table class="table-body">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Keluar</th>
                    <th>Tanggal Keluar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang_keluar as $item)
                    <tr>
                        <th>
                            {{ $loop->iteration }}
                        </th>
                        <td>
                            {{ $item->nama }}
                        </td>
                        <td>
                            {{ $item->jumlah . ' ' . $item->satuan }}
                        </td>
                        <td>
                            {{ $item->updated_at->format('d-m-Y H:i') }}
                    </tr>
                @endforeach
            </tbody>
        </table>
        <style>
            .right-align {
                width: 100%;
            }

            .left {
                width: 50%;
            }
        </style>
        <br>
        <br>
        {{-- <table class="right-align">
            <tr>
                <td>&nbsp;</td>
                <td class="left">&nbsp;</td>
                <td style="text-align: center">Sungai Penuh, {{ Carbon\Carbon::now()->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td style="text-align: center">Mengetahui<br>Kepala Kejaksaan Negeri Sungai Penuh</td>
                <td>&nbsp;</td>
                <td style="text-align: center">Kepala Seksi Tindak Pidana Umum<br>Kejaksaan Negeri Sungai Penuh</td>
            </tr>
            <tr>
                <td>&nbsp;<br>&nbsp;</td>
                <td>&nbsp;<br>&nbsp;</td>
                <td>&nbsp;<br>&nbsp;</td>
            </tr>
            <tr>
                <td style="text-align: center">Sukma Djaya Negara, SH., M.Hum</td>
                <td>&nbsp;</td>
                <td style="text-align: center">Wahyu Nugraha Efendi., SH., MH</td>
            </tr>
        </table> --}}
    </div>
</body>

</html>
