<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    use HasFactory;

    protected $table = 'accounts';

    protected $fillable = [
        'id','status','user_id','name','account_categorie_id','code'
    ];

    public function category():BelongsTo
    {
        return $this->belongsTo(AccountCategory::class,'account_categorie_id','id');
    }
    public function offers():HasMany
    {
        return $this->hasMany(Offers::class);
    }
    public function getNameAttribute($value)
    {
        return mb_strtoupper( $value);
    }
    public function getRouteKeyName(): string
    {
        return 'code';
    }
}
