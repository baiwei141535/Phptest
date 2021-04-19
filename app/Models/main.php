<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class main extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'price',
        'describe',
        'created_at',
        'updated_at',
  ];

  protected $table = 'goods';
}
