<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'chats';

    protected $fillable = [
        'id','status','user_id','demand_id','offer_id','code','text','send_at','send_to'
    ];
    protected $casts = [
        'send_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function getSendAtAttribute($value)
    {
        $diff = Carbon::now()->diffInHours(Carbon::createFromFormat('Y-m-d H:i:s', $value));
        // return $diff;
        if ($diff > 24) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $value)
                ->format('d/m/Y');
        } else {
            return Carbon::createFromFormat('Y-m-d H:i:s', $value)
                ->format('H:i');
        }
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function demand():BelongsTo
    {
        return $this->belongsTo(Demands::class);
    }
    public function offer():BelongsTo
    {
        return $this->belongsTo(Offers::class,'offer_id','id');
    }
    public function getRouteKeyName(): string
    {
        return 'code';
    }
}
