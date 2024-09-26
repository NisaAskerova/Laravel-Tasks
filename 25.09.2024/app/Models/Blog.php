<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public function category(){
        #1-1 elaqe
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
