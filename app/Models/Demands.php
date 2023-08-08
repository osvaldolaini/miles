<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Demands extends Model
{
    use HasFactory;

    protected $table = 'demands';

    protected $fillable = [
        'id', 'status', 'user_id', 'qtd', 'end_date', 'value', 'value_max', 'miles', 'code'
    ];
    protected $casts = [
        'end_date' => 'datetime:Y-m-d H:i:s',
    ];
    public function setValueAttribute($value)
    {
        $this->attributes['value'] = str_replace(",", ".", $value);;
    }
    public function setValueMaxAttribute($value)
    {
        $this->attributes['value_max'] = str_replace(",", ".", $value);;
    }
    public function getValueMaxAttribute($value)
    {
        return str_replace(".", ",", $value);
    }
    public function getValueAttribute($value)
    {
        return str_replace(".", ",", $value);
    }
    public function getMilesConvertAttribute()
    {
        $k = $this->miles / 1000;
        switch ($k) {
            case $k < 1:
                $m = $this->miles;
                break;
            case $k >= 1 && $k < 1000:
                $m =  $k . 'K';
                break;
            default:
                $m =  $k . 'K';
                break;
        }
        return $m;
    }
    public function getTimeCreateAttribute()
    {
        $d1 = strtotime($this->created_at);
        $d2 = strtotime(date('Y-m-d H:i:s'));
        $diff = abs($d1 - $d2);

        $years      = floor($diff / (365 * 60 * 60 * 24));
        $months     = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days       = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        $hours      = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24) / (60 * 60));
        $minutes    = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60) / 60);
        $seconds    = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60 - $minutes * 60));

        if ($years > 0) {
            return $years . ' anos';
        } else {
            if ($months > 0) {
                return $months . ' meses';
            } else {
                if ($days > 0) {
                    return $days . ' dias';
                } else {
                    if ($hours > 0) {
                        return $hours . ' horas';
                    } else {
                        return $minutes . ' min e ' . $seconds . ' s';
                    }
                }
            }
        }
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function offers(): HasMany
    {
        return $this->hasMany(Offers::class,'demand_id','id');
    }
    public function like($user)
    {
        $like = DemandLike::where('demand_id',$this->id)->where('user_id',$user)->first();
        if (isset($like)) {
            return true;
        }else{
            return false;
        }

    }
    public function getRouteKeyName(): string
    {
        return 'code';
    }
}