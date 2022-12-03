<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Words;


class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'catname',
        'image',
        'color',
    ]; 
    //  public function words(){
    //      return $this->hasMany(Words::class,'category_id','id');
    //  }
}
