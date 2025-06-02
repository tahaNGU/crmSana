<?php

namespace Modules\Base\Helpers;

use Modules\Base\Models\Logs;

class LogHelper
{
    /**
     * @param string $title
     * @param string $message
     * @param array $info
     * @return void
     */
    public static function LogMessage(string $title, string $message, array $info=[]){
        Logs::create([
            'title'=>$title,
            'message'=>$message,
            'info'=>$info
        ]);
    }
}
