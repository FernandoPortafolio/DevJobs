<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'skills',
        'image',
        'categoria_id',
        'experiencia_id',
        'ubicacion_id',
        'salario_id',
    ];

    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }

    public function salario() {
        return $this->belongsTo(Salario::class);
    }

    public function ubicacion() {
        return $this->belongsTo(Ubicacion::class);
    }

    public function experiencia() {
        return $this->belongsTo(Experiencia::class);
    }

    public function reclutador() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function candidatos() {
        return $this->hasMany(Candidato::class);
    }
}
