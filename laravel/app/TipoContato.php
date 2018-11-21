<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoContato extends Model
{
    protected $table = "TipoContato";
    protected $primaryKey = "TipoContatoId";
    public $timestamps = false;
}
