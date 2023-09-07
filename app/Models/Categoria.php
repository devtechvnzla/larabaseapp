<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;

class Categoria extends Model
{
	use HasFactory, HasAdvancedFilter, Tenantable;
	 
    public $timestamps  = true;

    protected $table    = 'categorias';

    protected $fillable = ['codigo','name','status','empresa_id','agencia_id'];

    public $orderable   = ['id','codigo','name','status','empresa_id','agencia_id'];

    public $filterable  = ['id','codigo','name','status','empresa_id','agencia_id'];
	
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
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medicinas()
    {
        return $this->hasMany('App\Models\Medicina', 'categoria_id', 'id');
    }
    
}
