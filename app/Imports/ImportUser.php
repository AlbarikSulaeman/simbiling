<?php

namespace App\Imports;

use App\Models\Users;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Helpers\Helper;

class ImportUser implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Users([
            'name' => $row['nama'],
            'email' => $row['email'],
            // 'phone_number' => $row['2'],
            'password' => bcrypt($row['nis']),
            'verification_code' => Helper::randomstring(4,'numeric'),
            'verification' => false,
        ]);
    }
}
