<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    protected $fillable = [
        'comu_codi',
        'comu_nomb',
        'muni_codi'
    ];

    use HasFactory;
    protected $table = 'tb_comuna';
    protected $primaryKey = 'comu_codi';
    public $timestamps = false;

    public function municipio()
    {
        return $this->hasOne(Municipio::class);
    }
}
