<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $table = 'matriculas'; // Nombre de la tabla
    protected $fillable = ['nombre'];

    // Relación inversa con matriculados
    public function matriculados()
{
    return $this->hasMany(Matriculado::class, 'matricula_id', 'id');
}
}