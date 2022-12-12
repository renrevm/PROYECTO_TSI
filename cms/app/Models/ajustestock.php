<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ajustestock extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'AjusteStocks';
    public $timestamps = false;
}
