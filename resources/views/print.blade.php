<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cetak data pengaduan </title>
</head>
<body>
    <table>
        <tr>
            <th>No</th>
            <th>Nik</th>
            <th>No_Telp</th>
            <th>Tanggal</th>
            <th>Pengaduan</th>
            <th>Gambar</th>
            <th>status Response</th>
            <th>pesan Response</th>
        </tr>
        @php $no = 1;@endphp
        @foreach($reports as $report)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$report['nik']}}</td>
            <td>{{$report ['nama']}}</td>
            <td>{{$report ['no_telp']}}</td>
            <td>{{ \Carbon\carbon::parse($report['created_at'])->format('j F,Y')}}</td>
            <td>{{$report['pengaduan']}}</td>
            <td><img src="assets/image/{{$report['foto']}}" width="80"></td>
            <td>
                {{-- cek apakah data report ini sudah memiliki relasi dengan data dr with ('response') --}}
                @if ($report['response'])
                  {{-- kalau ada hasil relasiny, tampilkan bagian status --}}
                    {{$report['response'] ['status'] }}
                @else
                {{-- kalau engga ada tampilkan tanda ini  --}}
                -
                @endif
              </td>
              <td>
                {{-- cek apakah data report in sudah memmiliki relasi dengan data dr with ('response') --}}
                @if ($report['response'])
                  {{-- kalau ada hasil relasinya sampaikan pesan  --}}
                  {{ $report['response']['pesan'] }}
                @else
                {{-- kalau tidak tampilkan tanda ini --}}
                -
                @endif
              </td>
              
        </tr>
        @endforeach
    </table>
</body>
</html>