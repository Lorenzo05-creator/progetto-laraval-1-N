<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

class Article extends Model
{
    protected $fillable = ['title', 'content'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    
  
}

