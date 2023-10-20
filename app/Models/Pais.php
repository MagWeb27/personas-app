<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $fillable = [
        'pais_codi',
        'pais_nomb',
        'pais_capi'
    ];

    protected $table = 'tb_pais';
    protected $primaryKey = 'pais_codi';
    public $timestamps = false;

    public function departamento()
    {
        return $this->hasMany(Departamento::class);
    }
}
