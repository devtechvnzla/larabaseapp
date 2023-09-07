<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Hash;
use App\Traits\Tenantable;

class Log extends Model
{
	use HasFactory,HasAdvancedFilter, Tenantable;

    public $timestamps = true;

    protected $table = 'logs';

    protected $fillable = ['user_id','empresa_id','descripcion','fecha_registro'];
    public $orderable = [
        'id',
        'user_id','empresa_id','descripcion','fecha_registro'
    ];

    public $filterable = [
        'id',
        'user_id','empresa_id','descripcion','fecha_registro'
    ];
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
