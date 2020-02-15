<?php

namespace App\Http\Controllers;

use App\Phone;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Imports\ContactImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Carbon;
use App\VideoconSms;

class excelController extends Controller
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function importExportView()
    {
        return view('import');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
//        dd('yi');
        $data = Excel::import(new UsersImport,request()->file('file'));
//        dd($data);
        return back();
    }

    public function contactImportView()
    {
        $contact['contacts'] = Phone::paginate(5);
        return view('contactImport', $contact);
    }

    public function contactImport(Request $request)
    {
        $this->validate($request,[
//           'file' => 'required|in:csv,xlsx,xls',
            'file' => 'required',
        ]);
        Excel::import(new ContactImport,request()->file('file'));

        return redirect()->back();
    }



    public function test()
    {
        return back()->with('success','Item created successfully!');
    }


}