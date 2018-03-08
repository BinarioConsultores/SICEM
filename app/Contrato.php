<?php

namespace sicem;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
  protected $table = 't_contrato';
  protected $primaryKey = 'cont_id';
  protected $hidden = [
      'created_at', 'updated_at',
  ];
  protected $fillable = [
        'cont_fecha', 'cont_tipopago','cont_concepto','cont_estado','cont_tipouso','cont_tiempo', 'cont_monto', 'cont_diffechsep', 'sol_id', 'dif_id', 'nicho_id', 'usu_id_reg', 'usu_id_auto','bolde_id'
  ];
  public function BoletaDetalle()
  {
      return $this->belongsTo('sicem\BoletaDetalle','bolde_id');
  }
  public function CSExtras()
  {
      return $this->hasMany('sicem\CSExtra','cont_id');
  }
  public function UsuarioReg()
  {
      return $this->belongsTo('sicem\User','usu_id_reg');
  }
  public function UsuarioAuto()
  {
      return $this->belongsTo('sicem\User','usu_id_auto');
  }
  public function Solicitante()
  {
      return $this->belongsTo('sicem\Solicitante','sol_id');
  }
  public function Convenios()
  {
      return $this->hasMany('sicem\Convenio','cont_id');
  }
  public function Difunto()
  {
      return $this->belongsTo('sicem\Difunto','dif_id');
  }
  public function TrasladosAnt()
  {
      return $this->hasMany('sicem\Traslado','cont_id_ant', 'cont_id');
  }
  public function TrasladosNue()
  {
      return $this->hasMany('sicem\Traslado','cont_id_nue', 'cont_id');
  }
  public function Nicho()
  {
      return $this->belongsTo('sicem\Nicho','nicho_id');
  }

}
