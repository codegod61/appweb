<?php

namespace App\Http\Controllers;

use App\Imports\UserImport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Cache;

class ExcelController extends Controller
{
    public function cache(Request $request){

        $data = Cache::remember('users', now()->addMinutes(5),function(){
            return User::get();
        });

        return view('excel.cache', compact('data'));
    }

    public function import(Request $request){

        return view('admin.siswa');
    }

    public function import_proses(Request $request){

        Excel::import(new UserImport(), $request->file('file'));

        return redirect()->back();
    }

}
