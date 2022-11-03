<?php

namespace App\Helpers;

use DateTime;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class Functions
{
    public function timeCreate($created){
        $d1 = new DateTime('now');
        $d2 = new DateTime($$created);
        $intervalo = $d1->diff( $d2 );
        //$elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
        if ($intervalo->d > 0){
            return $intervalo->d.'dias';
        }elseif($intervalo->h <= 0){
            if ($intervalo->h > 0) {
                return $intervalo->h.'horas';
            }else{
                return $intervalo->i.'min';
            }
        }
    }
    //Log
    public static function logging($subject_id,$subject_type){
        if(Auth::user()->group->level <= 1){
            $logger = Activity::where('subject_id',$subject_id)
            ->where('subject_type',$subject_type)
            ->where('description','updated')->orderBy('id','desc')
            ->get(); //returns the last logged activity
            if($logger){
                $logs = '<div class="row"><div class="col"><h2 class="text-center bg-dark text-white">Logs</h2></div></div><div class="row">
                    <div class="col">
                        <ul class="list-group list-group-flush">';
                            foreach ($logger as $log){
                                $arr = array_merge(array_diff_assoc($log->properties['old'], $log->properties['attributes']), array_diff_assoc($log->properties['attributes'], $log->properties['old']));
                                $logs .='<li class="list-group-item">
                                    Modificado em '.date( 'd/m/Y H:i' , strtotime($log->properties['attributes']['updated_at'])).
                                    'por ' .$log->properties['attributes']['updated_by'];
                                        if($arr){
                                            $logs .= '<br>Foram modificados : ';
                                            foreach ($arr as $key => $value){
                                                $logs .='<strong>['. $key .']</strong> para: '.$value.'; ' ;
                                            }
                                         }
                                         $logs .='</li>';
                            }
                            $logs .='</ul>
                    </div>
                </div>';
            }else{
                $logs = '';
            }
        }else{
            $logs = '';
        }
        return $logs;
    }
    //Valor para o banco de dados
    public static function valueDB($value)
    {
        if($value){
            str_replace(' ', '', $value);
            ltrim($value);
            $value = str_replace('.', '', $value);
            $value = str_replace(',', '.', $value);
            return str_replace(' ', '', $value);
        }
    }
}
