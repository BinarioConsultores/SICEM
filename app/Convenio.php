<?php

namespace sicem;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
  protected $table = 't_convenio';
  protected $primaryKey = 'conv_id';
  protected $hidden = [
      'created_at', 'updated_at'
  ];
  protected $fillable = [
        'conv_fecha', 'conv_cuotaini','conv_nrocuotas',
  ];
  public function PlanPagos()
  {
      return $this->hasMany('sicem\PlanPago','conv_id');
  }
  public function Contratos()
  {
      return $this->hasMany('sicem\Contrato','conv_id');
  }
  
}
