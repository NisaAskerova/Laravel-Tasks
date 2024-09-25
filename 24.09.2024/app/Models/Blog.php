<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // Cədvəlinizdə hansı sahələrə kütləvi təyin icazəsi verildiyini təyin edirsiniz
    protected $fillable = [
        'name',
        'title',
        'content'
    ];

    // Əgər tarixi sütunlarınız varsa (created_at və updated_at), timestamps aktiv qalır
    public $timestamps = true;
}
