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
        'conv_fecha', 'conv_cuotaini','conv_nrocuotas','cont_id',
  ];
  public function PlanPagos()
  {
      return $this->hasMany('sicem\PlanPago','conv_id');
  }
   public function Contrato()
  {
      return $this->belongsTo('sicem\Contrato','cont_id');
  }
}
