<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class login extends Model
{
    use HasFactory;

    protected $fillable = [
        'account',
        'password',
        'name',
        'created_at',
        'updated_at',
  ];
}
