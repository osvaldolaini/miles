<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Demands extends Model
{
    use HasFactory;

    protected $table = 'demands';

    protected $fillable = [
        'id', 'status', 'user_id', 'qtd', 'account_categorie_id',
        'end_date', 'value', 'value_max', 'miles', 'code'
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
    public function getFinishedAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at)
            ->format('d/m/Y');
    }
    public function getMilesConvertAttribute()
    {
        if ($this->miles > 0) {
            $k = $this->miles / 1000;
            switch ($k) {
                case $k < 1:
                    $m = $this->miles;
                    break;
                case $k >= 1 && $k < 1000:
                    $kk = explode('.', $k);
                    $m =  $kk[0] . 'K';
                    break;
                case $k >= 1000 && $k < 1000000:
                    $k = $k / 1000;
                    $kk = explode('.', $k);
                    $m =  $kk[0] . 'M';
                    break;
                case $k > 1000000:
                    $k = $k / 1000;
                    $kk = explode('.', $k);
                    $m =  $kk[0] . 'B';
                    break;
                default:
                    $m = $this->buy;
                    break;
            }
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
        return $this->hasMany(Offers::class, 'demand_id', 'id');
    }
    public function offer(): BelongsTo
    {
        return $this->belongsTo(Offers::class, 'offer_id', 'id');
    }
    public function like($user)
    {
        $like = DemandLike::where('demand_id', $this->id)->where('user_id', $user)->first();
        if (isset($like)) {
            return true;
        } else {
            return false;
        }
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(AccountCategory::class, 'account_categorie_id', 'id');
    }
    public function passengers(): HasMany
    {
        return $this->hasMany(DemandPassenger::class, 'demand_id', 'id');
    }
    public function rated()
    {
        $rated = RatingUser::select('id')->where('demand_id', $this->id)->where('user_id', $this->user_id)->first();
        if ($rated) {
            return true;
        } else {
            return false;
        }
    }
    public function getRouteKeyName(): string
    {
        return 'code';
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
