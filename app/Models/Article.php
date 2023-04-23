<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'full_text', 'category_id', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn (?string $path) => $path ? asset('storage/' . $path) : null,
            set: fn (UploadedFile $image) => $image->store('images', 'public'),
        );
    }
}
