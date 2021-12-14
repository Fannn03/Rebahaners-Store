<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_category',
        'code_category',
        'slug',
        'photo',
        'status',
        'description'
    ];

    protected $hidden = [
        'code_category'
    ];

    public function product(){
       return $this->hasMany(Product::class);
    }

    public function delete(){
        $this->product()->delete();
        parent::delete();
    }

}
