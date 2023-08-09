<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'style'];

     /**
     * The books that belong to the gnre.
     */
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
