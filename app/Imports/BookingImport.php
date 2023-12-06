<?php

namespace App\Imports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Facades\Excel;

class BookingImport implements ToCollection
{

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            dd($row);
        }
    }
}
