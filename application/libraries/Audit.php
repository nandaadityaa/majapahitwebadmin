<?php

class Audit {
    
    /*
     * Write log
     *
     * @param string $msg
     */
    public function write($msg)
    {
        $CI = &get_instance();
        
        $filepath = __DIR__.'/../logs/app-log-'.$CI->auth_m->data('adm_name').'-'.date('Y-m-d').'.php';
        $message  = '';

        if ( ! file_exists($filepath))
        {
                $message .= "<"."?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?".">\n\n";
        }

        if ( ! $fp = @fopen($filepath, FOPEN_WRITE_CREATE))
        {
                return FALSE;
        }

        $message .= date('Y m d H:i:s'). ' --> '.$msg."\n";

        flock($fp, LOCK_EX);
        fwrite($fp, $message);
        flock($fp, LOCK_UN);
        fclose($fp);

        @chmod($filepath, FILE_WRITE_MODE);
        return TRUE;    
    }
    
}
