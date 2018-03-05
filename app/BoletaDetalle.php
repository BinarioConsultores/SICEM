<?php

namespace sicem;

use Illuminate\Database\Eloquent\Model;

class BoletaDetalle extends Model
{
  protected $table = 't_boletadetalle';
  protected $primaryKey = 'bolde_id';
   protected $hidden = [
      'created_at', 'updated_at'
  ];
  protected $fillable = [
        'bolde_concepto','bolde_monto','bol_id', 
  ];
  public function Boleta()
  {
      return $this->belongsTo('sicem\Boleta','bol_id');
  }
  public function CSExtras()
  {
      return $this->hasMany('sicem\CSExtra','bolde_id');
  }
  public function Contratos()
  {
      return $this->hasMany('sicem\Contrato','bolde_id');
  }
  public function BDPPagos()
  {
      return $this->hasMany('sicem\BDPPago','bolde_id');
  }
  

}
