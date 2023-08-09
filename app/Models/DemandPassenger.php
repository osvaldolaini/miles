<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DemandPassenger extends Model
{
    use HasFactory;

    protected $table = 'demand_passengers';

    protected $fillable = [
        'id','demand_id','name','cpf','code'
    ];
    public function demand():BelongsTo
    {
        return $this->belongsTo(Demands::class);
    }
}
