<?php

namespace sicem;

use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
  protected $table = 't_solicitante';
  protected $primaryKey = 'sol_id';
   protected $hidden = [
      'created_at', 'updated_at',
  ];
  protected $fillable = [
        'sol_nombre', 'sol_telefono', 'sol_dir', 'sol_dni' 
  ];
  public function Contratos()
  {
      return $this->hasMany('sicem\Contrato','sol_id');
  }

}
