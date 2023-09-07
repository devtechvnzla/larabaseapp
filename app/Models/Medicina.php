<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;

class Medicina extends Model
{
	use HasFactory, Tenantable, HasAdvancedFilter;

    public $timestamps = true;

    protected $table = 'medicinas';

    protected $fillable = ['nu_codigo','nb_nombre','fecha_registo','mes','ano','empresa_id','user_id','categoria_id','nb_presentacion','fe_vencimiento','stock_inicial','stock_alerta','nu_lote','tx_descripcion','nb_marca','status'];

    public $orderable = ['id','nu_codigo','nb_nombre','fecha_registo','mes','ano','empresa_id','user_id','categoria_id','nb_presentacion','fe_vencimiento','stock_inicial','stock_alerta','nu_lote','tx_descripcion','nb_marca','status'];

    public $filterable = ['id','nu_codigo','nb_nombre','fecha_registo','mes','ano','empresa_id','user_id','categoria_id','nb_presentacion','fe_vencimiento','stock_inicial','stock_alerta','nu_lote','tx_descripcion','nb_marca','status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'categoria_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empresa()
    {
        return $this->hasOne('App\Models\Empresa', 'id', 'empresa_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

}
