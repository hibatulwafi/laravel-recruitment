<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KandidatExport;

class ExportController extends Controller
{
    public function kandidat_bybatch($id)
    {
        return Excel::download(new KandidatExport($id), 'users.xlsx');
    }
}
