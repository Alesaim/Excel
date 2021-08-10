<?php

namespace App\Imports;

use App\Models\Test;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TestsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Test([
            'name'    => $row[1],
            'email'   => $row[2],
            'address' => $row[3]
        ]);
    }
}
