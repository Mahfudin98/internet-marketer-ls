<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rank PDF {{ $bulan->format('F') }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <h5>Rank Point Bulan {{ $bulan->format('F') }}</h5>
    <hr>
    <table width="100%" class="table-hover table-bordered">
        <thead>
            <tr>
                <th>Rank</th>
                <th>Nama</th>
                <th>Type</th>
                <th>Total Point</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @forelse ($rank as $row)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $row->anggota->name }}</td>
                    <td>{{ $row->anggota->type }}</td>
                    <td>{{ $row->point }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
