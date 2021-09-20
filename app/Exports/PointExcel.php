<?php

namespace App\Exports;

use App\Models\Sosmed;
use Maatwebsite\Excel\Concerns\FromCollection;

class PointExcel implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sosmed::with(['anggota'])->orderBy('point', 'DESC')->get();
    }
}
