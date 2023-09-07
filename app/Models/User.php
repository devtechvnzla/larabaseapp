<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Hash;
use Illuminate\Contracts\Translation\HasLocalePreference;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Traits\Tenantable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;
    use HasAdvancedFilter;
    use Notifiable;
    use SoftDeletes;
    use HasRoles;
    use HasApiTokens;

    public $timestamps = true;

    protected $table = 'users';

    protected $fillable =
     [
        //'cif',
        'dpi',
        'name',
        'username',
        'email',
        'status',
        'agencia_id',
        'role_id'
    ];

     public $orderable =
     [
        'id',
        //'cif',
        'dpi',
        'name',
        'username',
        'email',
        'status',
        'agencia_id',
        'role_id'
     ];

       public $filterable = [
        'id',
        //'cif',
        'dpi',
        'name',
        'username',
        'email',
        'status',
        'agencia_id',
        'role_id'

    ];

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

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
    public function logins()
    {
        return $this->hasMany('App\Models\Login', 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        return $this->hasOne('App\Models\Role', 'id', 'role_id');
    }

    public function notificaciones(){
        return $this->belongsToMany(\App\Models\Notificaciones::class, 'notificacion_usuarios', 'user_id', 'notificacion_id');
    }


}
