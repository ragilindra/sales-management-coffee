<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class alat extends Model

{
    public $timestamps = false;
    // use HasFactory;
    protected $table = 'inventaris_alat';
}
