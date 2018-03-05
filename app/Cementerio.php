<?php

namespace sicem;

use Illuminate\Database\Eloquent\Model;

class Cementerio extends Model
{
  protected $table = 't_cementerio';
  protected $primaryKey = 'cement_id';
   protected $hidden = [
      'created_at', 'updated_at'
  ];
  protected $fillable = [
        'cement_nom', 
  ];
  public function Pabellones()
  {
      return $this->hasMany('sicem\Pabellon','cement_id');
  }

}
