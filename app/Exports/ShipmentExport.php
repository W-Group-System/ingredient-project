<?php

namespace App\Exports;

use App\Shipment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ShipmentExport implements WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Shipment::all();
    // }

    public function headings(): array
    {
        return [
            'SO No.',
            'Buyer Code',
            'Qty',
            'Product',
            'Load Date'
        ];
    }
}
