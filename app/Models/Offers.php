<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Offers extends Model
{
    use HasFactory;

    protected $table = 'offers';

    protected $fillable = [
        'id','status','user_id','order','demand_id','value','code'
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

}
