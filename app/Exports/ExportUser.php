<?php

namespace App\Exports;

// use App\Models\User;
use App\Models\Words;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportUser implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Words::select('words.wordname','categories.catname')
        ->leftJoin('categories','categories.id','words.category_id')
        ->get();
    }
}