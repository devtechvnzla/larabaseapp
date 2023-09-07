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

class Modulo extends Model
{

    use HasFactory;
    //use HasAdvancedFilter;
    //use Notifiable;
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'modulos';

    protected $fillable = ['name'];

    public $orderable =
      ['id','name'];

    public $filterable =
        ['id','name'];
	
}
