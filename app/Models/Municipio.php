<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $fillable = [
        'muni_codi',
        'muni_nomb',
        'depa_codi'
    ];

    protected $table = 'tb_municipio';
    protected $primaryKey = 'muni_codi';
    public $timestamps = false;

    public function comuna()
    {
        return $this->hasMany(Comuna::class);
    }

    public function departamento()
    {
        return $this->hasMany(Departamento::class);
    }

    public function pais()
    {
        return $this->hasOne(Pais::class);
    }
}
