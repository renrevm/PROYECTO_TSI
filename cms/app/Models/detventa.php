<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class detventa extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'det_ventas';
    public $timestamps = false;
}
