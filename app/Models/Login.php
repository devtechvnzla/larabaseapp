<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use App\Traits\Tenantable;
class Login extends Model
{
	use HasFactory;
    use HasAdvancedFilter;
    use Tenantable;

    public $timestamps = true;

    protected $table = 'logins';

    protected $fillable = ['user_id','user_agent','session_token','ip_address','login_at','logout_at','ciudad'];

     public $orderable = [
        'id',
       'user_id','user_agent','session_token','ip_address','login_at','logout_at','ciudad'
    ];

    public $filterable = [
        'id',
       'user_id','user_agent','session_token','ip_address','login_at','logout_at','ciudad'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function agencias()
    {
        return $this->belongsTo('App\Models\Agencia','agencia_id', 'id');
    }

     public function scopeWithUser($query)
    {
       return $query->with(['user' => function ($q) {
                   $q->select(['id', 'name']);
              }]);
    }

}
