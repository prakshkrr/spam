<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
class Words extends Model
{
    protected $fillable = [
        'id',
        'wordname',
        'category_id',
    ];

    //Mutator are used to format the attributes before saving
    public function sethighlightAttribute($value)
    {
        $this->attributes['highlight']= " /\b".strtolower($value)."\b/gi";
    }
   
  
    // public function categories()
    // {
    // return $this->belongsTo(Categories::class, 'category_id');
    // }
}
