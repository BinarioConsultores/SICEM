<?php

namespace sicem;

use Illuminate\Database\Eloquent\Model;

class Nicho extends Model
{
  protected $table = 't_nicho';
  protected $primaryKey = 'nicho_id';
  protected $hidden = [
      'created_at', 'updated_at',
  ];
  protected $fillable = [
        'nicho_nro', 'nicho_fila', 'nicho_col', 'nicho_precio', 'nicho_est', 'nicho_pathimag', 'pab_id'
  ];
  public function Pabellon()
  {
      return $this->belongsTo('sicem\Pabellon','pab_id');
  }
   public function Contratos()
  {
      return $this->hasMany('sicem\Contrato','nicho_id');
  }

}
