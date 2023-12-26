<?php

namespace App\Imports;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class UserImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $indexKe = 1;

        foreach($collection as $row){
            if($indexKe > 1) {

                $data['nisn'] = !empty($row[0]) ? $row[0] : '';
                // $data['username'] = !empty($row[1]) ? $row[1] : '';
                $data['nama'] = !empty($row[2]) ? $row[2] : '';
                $data['alamat'] = !empty($row[3]) ? $row[3] : '';
                // $data['password'] = !empty($row[4]) ? Hash::make($row[4]) : '';

                $data1['nisn_siswa'] = !empty($row[0]) ? $row[0] : '';
                $data1['username'] = !empty($row[1]) ? $row[1] : '';
                $data1['nama'] = !empty($row[2]) ? $row[2] : '';
                $data1['alamat'] = !empty($row[3]) ? $row[3] : '';
                $data1['password'] = !empty($row[4]) ? Hash::make($row[4]) : '';

                // dd($row);
                Siswa::create($data);
                User::create($data1);
            }

            $indexKe++;
        }
    }
}
