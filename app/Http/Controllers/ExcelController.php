<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UserImport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ExcelController extends Controller
{
    public function cache(Request $request)
    {
        $data = Cache::remember('users', now()->addMinutes(5), function () {
            return User::get();
        });

        return view('excel.cache', compact('data'));
    }

    public function import(Request $request)
    {
        return view('admin.siswa');
    }

    public function import_proses(Request $request)
    {
        Excel::import(new UserImport(), $request->file('file'));

        return redirect()->back();
    }

    public function exportUsers()
    {
        // $users = User::join('siswa', 'users.nisn_siswa', '=', 'siswa.nisn')
        // ->select('users.nisn_siswa', 'users.username', 'siswa.nama', 'siswa.alamat')
        // ->get();

        $users = User::leftJoin('siswa', 'users.nisn_siswa', '=', 'siswa.nisn')
        ->select([
            DB::raw('IFNULL(nisn_siswa, "Null") as nisn_siswa'),
            DB::raw('IFNULL(username, "Null") as username'),
            DB::raw('IFNULL(siswa.nama, "Null") as nama'),
            DB::raw('IFNULL(siswa.alamat, "Null") as alamat')
        ])
        ->get();


    return Excel::download(new UsersExport($users), 'siswa.xlsx');
    }
}
