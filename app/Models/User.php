<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;


use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'cpf'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function demands():HasMany
    {
        return $this->hasMany(Demands::class);
    }
    public function offers():HasMany
    {
        return $this->hasMany(Offers::class);
    }
    public function getBuyAttribute()
    {
        $trades = $this->demands->where('status',3);
        $buys = 0;
        if ($trades) {
            foreach ($trades as $buy) {
                $buys += $buy->miles;
            }
        }

        return $buys;
    }
    public function getSellAttribute()
    {
        if ($this->offers) {
            $trades = $this->offers->where('status',3);
            $sells = 0;
            if ($trades) {
                foreach ($trades as $sell) {
                    $sells += $sell->demand->miles;
                }
            }

            return $sells;
        }

    }
    public function getBuyConvertAttribute()
    {
        if ($this->buy > 0) {
            $k = $this->buy / 1000;
            switch ($k) {
                case $k < 1:
                    $m = $this->buy;
                    break;
                case $k >= 1 && $k < 1000:
                $kk = explode('.',$k);
                $m =  $kk[0] . 'K';
                break;
                case $k >= 1000000 && $k < 1000000000:
                    $k = $k / 1000;
                    $kk = explode('.',$k);
                    $m =  $kk[0] . 'M';
                    break;
                case $k > 1000000000:
                        $k = $k / 1000;
                        $kk = explode('.',$k);
                        $m =  $kk[0] . 'B';
                        break;
            default:
                $m = $this->buy;
                break;
            }
        }
        return $m;
    }
    public function getSellConvertAttribute()
    {
        if ($this->sell > 0) {
            $k = $this->sell / 1000;
            switch ($k) {
                case $k < 1:
                    $m = $this->sell;
                    break;
                case $k >= 1 && $k < 1000:
                $kk = explode('.',$k);
                $m =  $kk[0] . 'K';
                break;
                case $k >= 1000000 && $k < 1000000000:
                    $k = $k / 1000;
                    $kk = explode('.',$k);
                    $m =  $kk[0] . 'M';
                    break;
                case $k > 1000000000:
                        $k = $k / 1000;
                        $kk = explode('.',$k);
                        $m =  $kk[0] . 'B';
                        break;
            default:
                $m = $this->sell;
                break;
            }
        }
        return $m;
    }
    public function like(): HasMany
    {
        return $this->hasMany(DemandLike::class,'user_id','id');
    }
    public function chats():HasMany
    {
        return $this->hasMany(Chat::class,'user_id','id');
    }
    public function sendTo():HasMany
    {
        return $this->hasMany(Chat::class,'send_to','id');
    }
    public function accounts():HasMany
    {
        return $this->hasMany(Account::class,'user_id','id');
    }
    public function passengers():HasMany
    {
        return $this->hasMany(DemandPassenger::class,'user_id','id');
    }
    public function getRouteKeyName(): string
    {
        return 'username';
    }
}
