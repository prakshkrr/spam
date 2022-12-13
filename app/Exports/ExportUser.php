<?php

namespace App\Exports;

// use App\Models\User;
use App\Models\Words;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportUser implements FromCollection, WithHeadings
{

    public function headings():array{
        return[
           'word_name',
           'category_name' 
        ];
    } 
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