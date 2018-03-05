<?php

namespace sicem;

use Illuminate\Database\Eloquent\Model;

class CSExtra extends Model
{
  protected $table = 't_csextra';
  protected $primaryKey = 'csextra_id';
  protected $hidden = [
      'created_at', 'updated_at',
  ];
  protected $fillable = [
        'cont_id','sextra_id', 'bolde_id'
  ];
  public function Contrato()
  {
      return $this->belongsTo('sicem\Contrato','cont_id');
  }
  public function ServicioExtra()
  {
      return $this->belongsTo('sicem\ServicioExtra','sextra_id');
  }
  public function BoletaDetalle()
  {
      return $this->belongsTo('sicem\BoletaDetalle','bolde_id');
  }

}
