<?php

namespace App\Imports;

use App\Models\Pensiunan;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PensiunanImport implements ToModel,WithHeadingRow, WithValidation,SkipsOnFailure
{
    use Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pensiunan([
            'nama'=> $row['nama'],
            'no_pensiunan'=> $row['no_pensiunan'],
            'alamat'=> $row['alamat'],
            'no_telp'=> $row['no_telp'],
        ]);
    }
    public function rules(): array{
        return [
            'nama' => 'required',
            'no_pensiunan' => 'required|unique:pensiunans',
            'alamat' => 'required',
            'no_telp' => 'required',
        ];
    }
}
