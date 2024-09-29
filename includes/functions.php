<?php

    function error_msg($msg){

        return  "<div class='alert alert-danger' role='alert'>
                $msg
            </div>";
    }  
    
    function success_msg($msg){

        return  "<div class='alert alert-success msg-hide' role='alert'>
                $msg
            </div>";
        
    }

    function show_date($date){

        $dt = new DateTime($date);
        return $dt->format('Y-m-d');
    }

    function baseUrl(){
        // output: /myproject/index.php
        $currentPath = $_SERVER['PHP_SELF'];
        // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index ) 
        $pathInfo = pathinfo($currentPath);
        // output: localhost
        $hostName = $_SERVER['HTTP_HOST'];
        // output: http://
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
        // return: http://localhost/myproject/
        return $protocol.$hostName.$pathInfo['dirname']."/";
    }

?>