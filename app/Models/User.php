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

class User extends Authenticatable
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
    public function getTradeAttribute()
    {
        $trades = $this->demands->where('status',2);
        $buys = 0;
        if ($trades) {
            foreach ($trades as $buy) {
                $buys += $buy->miles;
            }
        }

        return $buys;
    }
    public function getTradeConvertAttribute()
    {
        if ($this->trade > 0) {
            $k = $this->trade / 1000;
            switch ($k) {
                case $k < 1:
                    $m = $this->trade;
                    break;
                case $k >= 1 && $k < 1000:
                    $m =  $k . 'K';
                    break;
                default:
                    $m =  $k . 'K';
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

}
