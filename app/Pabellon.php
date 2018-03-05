<?php

namespace sicem;

use Illuminate\Database\Eloquent\Model;

class Pabellon extends Model
{
  protected $table = 't_pabellon';
  protected $primaryKey = 'pab_id';
   protected $hidden = [
      'created_at', 'updated_at',
  ];
  protected $fillable = [
        'pab_nom', 'pab_nrofil', 'pab_nrocol', 'pab_tiponum', 'pab_cantnicho', 'pab_pathimag', 'cement_id'
  ];
  public function Nichos()
  {
      return $this->hasMany('sicem\Nicho','pab_id');
  }
    public function Cementerio()
  {
      return $this->belongsTo('sicem\Cementerio','cement_id');
  }

}
