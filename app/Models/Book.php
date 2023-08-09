<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tags\Generic;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'authors', 'released_at', 'pages', 'isbn', 'in_stock'];

    /**
     * The genres that belong to the bool.
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    
    public function borrows() {
        return $this->hasMany(Borrow::class, 'book_id');
    }
    
    public function activeBorrows() {
        return $this->getAllBorrows()->where('status', '=', 'ACCEPTED');
    }
}
