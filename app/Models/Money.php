<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    use HasFactory;
    protected $table = 'money';
    protected $fillable = [
      'nis',
      'name',
      'region',
      'class',
      'money', 
      'created_at',
      'updated_at',
    ];
}
