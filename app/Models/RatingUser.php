<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RatingUser extends Model
{
    use HasFactory;

    protected $table = 'rating_users';

    protected $fillable = [
        'id','user_id','rate','demand_id','offer_id','code','text'
    ];
    public function demand():BelongsTo
    {
        return $this->belongsTo(Demands::class,'demand_id','id');
    }
    public function offer():BelongsTo
    {
        return $this->belongsTo(Offers::class,'offer_id','id');
    }
    public function rated():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
