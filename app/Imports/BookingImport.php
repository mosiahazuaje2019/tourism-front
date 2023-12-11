<?php

namespace App\Imports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class BookingImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Booking|null
     */
    public function model(array $row)
    {
        $dateOnDays = $row['date'];
        $dateBase   = Carbon::createFromDate(1900, 1, 1);
        $date       = $dateBase->addDays($dateOnDays -2);
        
        return new Booking([
            'pax'         => $row['pax'],
            'service'     => $row['service'],
            'client_name' => $row['client_name'],
            'hotel'       => $row['hotel'],
            'flight'      => $row['flight'],
            'date'        => $date,
            'time'        => $row['time'],
            'comments'    => $row['comments']
        ]);
    }
}
