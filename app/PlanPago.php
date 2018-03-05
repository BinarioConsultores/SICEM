<?php

namespace sicem;

use Illuminate\Database\Eloquent\Model;

class PlanPago extends Model
{
  protected $table = 't_planpago';
  protected $primaryKey = 'ppago_id';
  protected $fillable = [
      'created_at', 'updated_at',
  ];
  protected $fillable = [
        'ppago_fechaven', 'ppago_nrocuota', 'ppago_montocuota', 'ppago_saldocuota','conv_id',
  ];
  public function BDPPagos()
  {
      return $this->hasMany('sicem\BDPPago','ppago_id');
  }
  public function Convenio()
  {
      return $this->belongsTo('sicem\Convenio','conv_id');
  }

}
