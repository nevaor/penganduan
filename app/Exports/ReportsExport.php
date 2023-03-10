<?php

namespace App\Exports;

use App\Models\Report;
//mengambildata dari database
use Maatwebsite\Excel\Concerns\FromCollection;
//mengatur nama nama di kolum header 
use Maatwebsite\Excel\Concerns\WithHeadings;
//mengatur data yang dimunculkan tiap colum di excelnya
use Maatwebsite\Excel\Concerns\WithMapping; 

class ReportsExport implements FromCollection ,WithHeadings ,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //didalam  sini boleh menyertakan perintah eloquent seperti where,all,dll
        return Report::with('response')->orderBy('created_at', 'DESC')->get();
    }
    //mengatur nama nama column headers: diambil dari withHeadings
    public function headings(): array
    {
       return [
                'id',
                'NIK pelapor',
                'Nama pelapor',
                'No Telp pelapor',
                'Tanggal pelapor',
                'Pengaduan',
                'status response',
                'pesan response',

       ];
    }
    //mengatur data yang ditampilkan percolumn di excelnya
    //fungsinya sama seperti foreach. $item merupakan bagian as pada foreach 
    public function map($item): array
    {
        return [
            $item->id,
            $item->nik,
            $item->nama,
            $item->no_telp,
            \Carbon\Carbon::parse($item->created_at)->format('j f,y'),
            $item->pengaduan,
            $item->response ? $item->response['status'] : '-',
            $item->response ? $item->response['pesan'] : '-',
        ];
    }
}
