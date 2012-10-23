<?php

class Debugger {
    
    static function tailAt($filename,$obj){
        $pre = "/usr/local/VuFind-Plus/vufind/web/";
        $path = $pre.$filename;
        if($obj != null){
            ob_start();
            var_dump($obj);
            $result = ob_get_clean();
            file_put_contents($path,$result,FILE_APPEND);
            file_put_contents($path,"",FILE_APPEND);
            file_put_contents($path,"\n================================================",FILE_APPEND);
        }
    }
    static function clean($filename){
        $pre = "/usr/local/VuFind-Plus/vufind/web/";
        $path = $pre.$filename;
        file_put_contents($path,"");
    }
    static function printBacktrace($filename){
        $pre = "/usr/local/VuFind-Plus/vufind/web/";
        $path = $pre.$filename;
        ob_start();
        debug_print_backtrace();
        $result = ob_get_clean();
        file_put_contents($path,$result,FILE_APPEND);
        file_put_contents($path,"",FILE_APPEND);
        file_put_contents($path,"\n================================================\n",FILE_APPEND);
    }
}