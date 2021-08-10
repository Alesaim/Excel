<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TestsImport;
use App\Exports\TestsExport;

class TestController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImportExport()
    {
       return view('file_import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
        Excel::import(new TestsImport, $request->file('file')->store('temp'));
        return back()->with('success','Data imported successfully');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
         return Excel::download(new TestsExport, 'collection.xlsx');    }    
}

