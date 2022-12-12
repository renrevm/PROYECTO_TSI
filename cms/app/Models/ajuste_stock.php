<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ajuste_Stock extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'Ajustes_Stock';
    public $timestamps = false;
}
