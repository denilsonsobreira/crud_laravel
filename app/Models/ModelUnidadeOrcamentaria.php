<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ModelUnidadeOrcamentaria extends Model
{
    protected $table = 'unidade_orcamentarias';
    protected $fillable = ['descricao', 'orgao_id'];

    public function relOrgaos(){
        return $this->hasOne('App\Models\ModelOrgao', 'id' ,'orgao_id');
    }
}
