<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "Cliente";
    protected $primaryKey = "ClienteId";
    protected $fillable = ["Nome","CPF","DataNascimento","Sexo","FotoUrl","FotoDescricao","AutorizaEmail","Ativo"];
    public $timestamps = false;
    
    public function Cliente() {
        $this->hasMany(ClienteContato::class,'ClienteId','ClienteId');
        $this->hasMany(ClienteEndereco::class,'ClienteId','ClienteId');
        return $this;
    }
}
