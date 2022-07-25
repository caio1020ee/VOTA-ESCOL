<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class votacao extends Model
{
    use HasFactory;
    protected $table = "TB_VOTACAO";
    protected $fillable = ['VOT_USU_CODIGO','VOT_CAN_CODIGO'];
    public function candidatos(){
        return $this->hasMany('Candidato');
    }
}
