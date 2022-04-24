<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;

class ExcelController extends Controller
{
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function import(Request $request) 
    {
        Excel::import(new UsersImport, $request->file);
        return redirect('/')->with('success', 'All good!');
    }
}
