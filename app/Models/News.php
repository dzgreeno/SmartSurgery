<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    // الحقول القابلة للملء (Mass Assignment)
    protected $fillable = [
        'title',     // عنوان الخبر
        'content',   // نص الخبر
        'image'      // صورة الخبر (اختياري)
    ];
}
