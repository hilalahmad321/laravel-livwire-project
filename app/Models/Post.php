<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ["title", "cat_id", "user_id", "description", "images"];
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Category::class, "cat_id");
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}