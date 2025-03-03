<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactMessage extends Model
{
    use HasFactory;

    // Ορίζεις τα επιτρεπόμενα πεδία για μαζική ανάθεση
    protected $fillable = [
        'name',
        'email',
        'message',
    ];
}
