<?php

namespace App\Http\Controllers;

use App\Exports\ProdFillingsExport;
use Maatwebsite\Excel\Facades\Excel;

class ProdFillingsController extends Controller
{
    public function export()
    {
        return Excel::download(new ProdFillingsExport, 'prod_fillings.xlsx');
    }
}
