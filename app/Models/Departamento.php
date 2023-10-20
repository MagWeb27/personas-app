<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'depa_codi',
        'depa_nomb',
        'pais_codi'
    ];

    use HasFactory;
    protected $table = 'tb_departamento';
    protected $primaryKey = 'depa_codi';
    public $timestamps = false;

    public function pais()
    {
        return $this->hasOne(Pais::class);
    }

    public function municipio()
    {
        return $this->hasOne(Municipío::class);
    }
}
