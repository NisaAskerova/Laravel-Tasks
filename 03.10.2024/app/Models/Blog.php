<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model {
    protected $fillable = ['title', 'content', 'is_active', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
