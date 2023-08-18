<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Offers extends Model
{
    use HasFactory;

    protected $table = 'offers';

    protected $fillable = [
        'id','status','user_id','order','demand_id','value','code','account_id'
    ];
    public function setValueAttribute($value)
    {
        $this->attributes['value'] = str_replace(",", ".", $value);
    }
    public function getValueAttribute($value)
    {
        return str_replace(".", ",", $value);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function account():BelongsTo
    {
        return $this->belongsTo(Account::class,'account_id','id');
    }
    public function demand():BelongsTo
    {
        return $this->belongsTo(Demands::class,'demand_id','id');
    }
    public function getRouteKeyName(): string
    {
        return 'code';
    }
    public function chat():HasMany
    {
        return $this->hasMany(Chat::class,'offer_id','id');
    }
    public function getSinceAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at)
                ->format('d/m/Y');
    }
    public function getOrderAttribute()
    {

        $status = $this->status;
        if ($this->end_date < date('Y-m-d H:i:s') && $this->status == 1) {
            $status = 4;
        }

        switch ($status) {
            case 0:
                return  0;
                break;
            case 1:
                return  10;
                break;
            case 2:
                return  2;
                break;
            case 3:
                return  3;
                break;
            case 4:
                return  1;
                break;
            default:
                return  10;
                break;
        }
    }

}
