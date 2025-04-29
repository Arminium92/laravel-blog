<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

  public function getJalaliDateAttribute()
  {
    return verta($this->created_at)->format('%B %d، %Y');
  }

  public function title(): Attribute
  {
    return Attribute::make(
      get: fn(string $value) => ucwords($value),    
    );
  }
}
