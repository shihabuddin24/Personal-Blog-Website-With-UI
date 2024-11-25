<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [''];

    // protected $fillable =[
    //     'user_id',
    //     'category_id',
    //     'title',
    //     'short_description',
    //     'descriptiion',
    //     'thumbnail',
    //     'status'
    // ];

    public function onecategory(){
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function oneuser(){
        return $this->hasOne(User::class,'id','user_id');
    }


}
