<?php

namespace App\Imports;

use App\Contact;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Phone;

class ContactImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Phone([
            'name'     => $row[0],
            'email'    => $row[1],
            'phone'    => $row[2],
        ]);
    }
}
