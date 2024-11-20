<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operatore extends Model
{
    use HasFactory;

    protected $table = 'operatori';

    protected $fillable = ['nome'];
}
