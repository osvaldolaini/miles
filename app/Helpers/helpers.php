<?php

if(!function_exists('timeCreate')){
    function timeCreate($created){
        $d1 = strtotime($created);
        $d2 = strtotime(date('Y-m-d H:i:s'));
        $diff = abs($d1 - $d2);

        $years      = floor($diff / (365*60*60*24));
        $months     = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days       = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $hours      = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
        $minutes    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);
        $seconds    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));

        if ($years > 0){
            return $years.' anos';
        }else{
            if ($months > 0) {
                return $months.' meses';
            }else{
                if ($days > 0) {
                    return $days.' dias';
                }else{
                    if ($hours > 0) {
                        return $hours.' horas';
                    }else{
                        return $minutes.' min e '.$seconds. ' s' ;
                    }
                }
            }
        }

    }
}

