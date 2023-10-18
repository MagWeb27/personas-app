<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipío extends Model
{
    use HasFactory;

    protected $table = 'tb_municipio';
    protected $primaryKey = 'muni_codi';
    public $timestamps = false;

    public function comuna()
    {
        return $this->hasMany(Comuna::class);
    }
}
