<?php

namespace sicem;

use Illuminate\Database\Eloquent\Model;

class BDPPago extends Model
{
  protected $table = 't_bdppago';
  protected $primaryKey = 'bdpp_id';
  protected $fillable = [
        'created_at', 'updated_at'
  ];
  protected $fillable = [
        'ppago_id', 'bolde_id', 
  ];
  public function PlanPago()
  {
      return $this->belongsTo('sicem\PlanPago','ppago_id');
  }
   public function BoletaDetalle()
  {
      return $this->belongsTo('sicem\BoletaDetalle','bolde_id');
  }

}
