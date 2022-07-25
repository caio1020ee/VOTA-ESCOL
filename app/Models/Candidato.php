<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;
    protected $table = "TB_CANDIDATOS";
    protected $fillable = ['CAN_NOME','CAN_VICE', 'CAN_IMAGEM'];
}
