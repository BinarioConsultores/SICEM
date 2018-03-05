<?php

namespace sicem;

use Illuminate\Database\Eloquent\Model;

class ServicioExtra extends Model
{
  protected $table = 't_servicioextra';
  protected $primaryKey = 'sextra_id';
   protected $hidden = [
      'created_at', 'updated_at',
  ];
  protected $fillable = [
        'sextra_desc', 'sextra_costo',
  ];

  public function CSExtras()
  {
      return $this->hasMany('sicem\CSExtra','sextra_id');
  }
  
}
