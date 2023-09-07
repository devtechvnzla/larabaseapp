<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use App\Traits\Tenantable;

class Doctor extends Model
{
    use HasFactory, HasAdvancedFilter, Tenantable;
    
    public $timestamps = true;

    protected $table = 'doctor'; 

    protected $fillable = ['name','documento','telefono','licencia_colegio_medico','licencia_mpps','fecha_nacimiento','edad','status','empresa_id','especialista_id','agencia_id'];

    public $orderable = ['id','name','documento','telefono','licencia_colegio_medico','licencia_mpps','fecha_nacimiento','edad','status','empresa_id','especialista_id','agencia_id'];

    public $filterable = ['id','name','documento','telefono','licencia_colegio_medico','licencia_mpps','fecha_nacimiento','edad','status','empresa_id','especialista_id','agencia_id'];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function agencia()
    {
        return $this->hasOne('App\Models\Agencia', 'id', 'agencia_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consultas()
    {
        return $this->hasMany('App\Models\Consulta', 'doctor_id', 'id');
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
    public function especialista()
    {
        return $this->hasOne('App\Models\Especialista', 'id', 'especialista_id');
    }
    
}
