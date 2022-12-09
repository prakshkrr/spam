<?php

namespace App\Imports;

// use App\Models\User;
use App\Models\Words;
use App\Models\Categories;
use DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class ImportUser implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $category =Categories::where('categories.catname', $row['category_name'])->first();
        $words = Words ::where('words.wordname', $row['word_name'])->first();
         if($category)
        {
            if($words)
            {
                DB::table('words')
                ->where('wordname')
                ->update(array('wordname' => $row['word_name']));
            
            }else{
                return new Words([
                    'wordname' => $row['word_name'],
                    'category_id' =>$category->id,
                ]);
            }
        }else
        {            
            return null;
        }
    }
    
}  