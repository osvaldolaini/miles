<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DemandLike extends Model
{
    use HasFactory;

    protected $table = 'demand_likes';

    protected $fillable = [
        'id','user_id','demand_id'
    ];

    public function demand():BelongsTo
    {
        return $this->belongsTo(Demands::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
