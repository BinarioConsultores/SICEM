<?php

namespace sicem;

use Illuminate\Database\Eloquent\Model;

class Traslado extends Model
{
  protected $table = 't_traslado';
  protected $primaryKey = 'tras_id';
  protected $hidden = [
      'created_at', 'updated_at',
  ];
  protected $fillable = [
        'tras_fecha', 'tras_est', 'cont_id_ant', 'cont_id_nue', 
  ];
  public function ContratoAnt()
  {
      return $this->belongsTo('sicem\Contrato','cont_id_ant');
  }
  public function ContratoNue()
  {
      return $this->belongsTo('sicem\Contrato','cont_id_nue');
  }

}
