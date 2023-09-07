<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;

class Paciente extends Model
{
	use HasFactory, HasAdvancedFilter, Tenantable;
	
    public $timestamps = true;

    protected $table = 'pacientes';

    protected $fillable = ['tx_nombres','nu_cedula','tx_direccion','nu_edad','nu_telefono','fe_nacimiento','genero','status','empresa_id','agencia_id'];

    public $orderable =['id', 'tx_nombres','nu_cedula','tx_direccion','nu_edad','nu_telefono','fe_nacimiento','genero','status','empresa_id','agencia_id'];

    public $filterable =['id', 'tx_nombres','nu_cedula','tx_direccion','nu_edad','nu_telefono','fe_nacimiento','genero','status','empresa_id','agencia_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function agencia()
    {
        return $this->hasOne('App\Models\Agencia', 'id', 'agencia_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empresa()
    {
        return $this->hasOne('App\Models\Empresa', 'id', 'empresa_id');
    }
    
}
