<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class arqueo_caja extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'Arqueos_Caja';
    public $timestamps = false;
}
