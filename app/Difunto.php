<?php

namespace sicem;

use Illuminate\Database\Eloquent\Model;

class Difunto extends Model
{
  protected $table = 't_difunto';
  protected $primaryKey = 'dif_id';
  protected $hidden = [
      'created_at', 'updated_at',
  ];
  protected $fillable = [
        'dif_nom', 'dif_ape','dif_dni','dif_fechadef', 'dif_obser'
  ];
  public function Contratos()
  {
      return $this->hasMany('sicem\Contrato','dif_id');
  }
}
