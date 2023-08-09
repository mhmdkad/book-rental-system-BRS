<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable = ['reader_id', 'book_id','status', 'deadline', 'request_processed_at', 'request_managed_by', 'returned_at', 'return_managed_by'];
}
