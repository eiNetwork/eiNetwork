<?php

class Debugger {
    
    static function tailAt($filename,$obj){
        $pre = getcwd()."/";
        $path = $pre.$filename;
        if($obj != null){
            ob_start();
            var_dump($obj);
            $result = ob_get_clean();
            file_put_contents($path,$result,FILE_APPEND);
            file_put_contents($path,"\n",FILE_APPEND);
            ob_end_clean();
        }else{
            ob_start();
            file_put_contents($path,"Object is null",FILE_APPEND);
            file_put_contents($path,"",FILE_APPEND);
            file_put_contents($path,"\n================================================\n\n\n",FILE_APPEND);
            ob_end_clean();
        }
    }
    static function clean($filename){
        $pre = getcwd()."/";
        $path = $pre.$filename;
        file_put_contents($path,"");
    }
    static function printBacktrace($filename){
        $pre = getcwd()."/";
        $path = $pre.$filename;
        ob_start();
        debug_print_backtrace();
        $result = ob_get_clean();
        file_put_contents($path,$result,FILE_APPEND);
        file_put_contents($path,"",FILE_APPEND);
        file_put_contents($path,"\n================================================\n\n\n",FILE_APPEND);
    }
    static function printTitle($filename){
        $pre = getcwd()."/";
        $path = $pre.$filename;
        ob_start();
        debug_print_backtrace();
        $result = ob_get_clean();
        $trace = split("\n",$result);
        file_put_contents($path,"\n==============".$trace[1]."===========\n",FILE_APPEND);
        file_put_contents($path,"",FILE_APPEND);
        //file_put_contents($path,"\n================================================\n\n\n",FILE_APPEND);
    }
    
}