<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteContato extends Model
{
    protected $table = "ClienteContato";
    protected $primaryKey = "ClienteContatoId";
    protected $fillable = ["Contato","Ativo"];
    public $timestamps = false;
    
    public function ClienteContato() {
        return $this->hasOne(TipoContato::class,'TipoContatoId','TipoContatoId');
    }
}
