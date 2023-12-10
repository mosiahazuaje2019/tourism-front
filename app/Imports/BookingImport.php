<?php

namespace App\Imports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BookingImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Booking|null
     */
    public function model(array $row)
    {
        return new Booking([
            'pax' => $row['pax'],
            'service' => $row['service']
        ]);
    }
}
