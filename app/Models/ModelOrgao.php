<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelOrgao extends Model
{
    protected $table = 'orgaos';
    protected $fillable = ['descricao', 'codigo'];

    public function relUnidadeOrcamentaria(){
        return $this->hasMany('App\Models\ModelUnidadeOrcamentaria','orgao_id');
    }
}
