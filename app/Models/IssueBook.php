<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueBook extends Model
{
    use HasFactory;
    // protected $table = 'issue_books';  

    protected $fillable = [
        'book_id',
        'user_id',
        'user_name',
        'issue',
    ];
}