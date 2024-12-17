<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matriculado extends Model
{
    use HasFactory;

    protected $table = 'matriculados'; // Nombre de la tabla
    protected $fillable = ['nombre', 'apellido', 'matricula_id'];

    // Relación con la tabla matriculas
    public function matricula()
{
    return $this->belongsTo(Matricula::class, 'matricula_id', 'id');
}
}