<?php

namespace App\Exports;

use Maatwebsite\Excel\Facades\Excel;
use App\Models\ProdFilling;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProdFillingsExport implements FromCollection
{
    public function collection()
    {
        return ProdFilling::all();
    }

    public function getOptionsFormComponents()
    {
        // Add your custom logic here if needed
    }

    public function export()
    {
        $export = new self();
        return Excel::download($export, 'prod_fillings.xlsx');
    }
}


