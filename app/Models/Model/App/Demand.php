<?php

namespace App\Models\Model\App;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Spatie\Activitylog\Traits\LogsActivity;

class Demand extends Model
{
    use HasFactory;
    use Notifiable, LogsActivity;

    protected static $logAttributes = ['value', 'value_max', 'miles', 'qtd'];
    protected $fillable = [
        'value', 'value_max', 'miles', 'qtd'
    ];
    protected $dates = [
        'end_date'
    ];
    // public function setEndDateAttribute($value)
    // {
    //     if ($value != "") {
    //         $this->attributes['end_date']=implode("-",array_reverse(explode("/",$value)));
    //     }else{
    //         $this->attributes['end_date']=NULL;
    //     }
    // }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
