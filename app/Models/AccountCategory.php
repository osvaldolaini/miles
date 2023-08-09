<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AccountCategory extends Model
{
    use HasFactory;

    protected $table = 'account_categories';

    protected $fillable = [
        'id','active','title','code'
    ];

    public function accounts():HasMany
    {
        return $this->hasMany(Account::class);
    }
    public function getTitleAttribute($value)
    {
        return mb_strtoupper( $value);
    }
}
