<?php

namespace App\Models\Model\App;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Spatie\Activitylog\Traits\LogsActivity;

class Offer extends Model
{
    use HasFactory;
    use Notifiable, LogsActivity;

    protected static $logAttributes = ['value','demand_id','user_id'];
    protected $fillable = [
        'value','demand_id','user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function demand()
    {
        return $this->belongsTo(Demand::class);
    }

}
