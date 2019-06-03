<?php

namespace App\Exports;

use App\cita;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return cita::reporteriaCita();
    }
}
