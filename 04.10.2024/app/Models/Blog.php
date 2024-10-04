<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image',
    ];
    use HasFactory;
    public function category(){
        return $this->hasOne(Category::class , 'id', 'category_id');
    }
    public function tag(){
        return $this->hasOne(Tag::class , 'id', 'tag_id');

    }
}
