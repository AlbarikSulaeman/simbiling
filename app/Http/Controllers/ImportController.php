<?php

namespace App\Http\Controllers;

use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\ExportUser;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $test = function($reader) {
            $reader->sheet(0);
        };
        dd($test);
        $file = $request->file('file')->store('files');
        $data = Excel::import(new ImportUser, $file, null, function($reader) {
            $reader->sheet(0);
        })->get();
        // dd($file);

        $data = $data->toArray();

        $connection = DB::connection('mongodb');
        $collection = $connection->getCollection('users');

        foreach ($data as $item) {
            $collection->insert($item);
        }

        return back()->with('success', 'Data has been imported successfully.');
    }
}
