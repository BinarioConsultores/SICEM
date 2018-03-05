<?php

namespace sicem;

use Illuminate\Database\Eloquent\Model;

class Boleta extends Model
{
  protected $table = 't_boleta';
  protected $primaryKey = 'bol_id';
  protected $hidden = [
      'created_at', 'updated_at'
  ];
  protected $fillable = [
        'bol_nro','bol_dni','bol_nom','bol_fecha', 
  ];
  public function BoletaDetalles()
  {
      return $this->hasMany('sicem\BoletaDetalle','bol_id');
  }
}
