<?php
include_once 'db.php';

class MainController
{
     protected $table;
     public $users;
     public $category;
     public $location;
     public $product;
     public $orders;
     

    //  public $mailSender;

     public function __construct(){ 
        spl_autoload_register('self::ClassLoader');
        $db = DB::getInstance();
        $this->db = $db->getConnection();
        $this->users = new users();
        $this->location = new location();
        $this->category = new category();
        $this->product = new product();
        $this->orders = new orders();
        $this->common = new common();
       
        //define("BASE_URL", $this->baseUrl());
        // print_r($_SERVER);
        // $this->mailSender = new MailSender();
    } 


    public static  function ClassLoader($className)
    {
        $path = dirname(__FILE__) .'/';
        include $path.$className.'.php';
    }

    // public function baseUrl(){
    //     // output: /myproject/index.php
    //     $currentPath = $_SERVER['PHP_SELF'];
    //     // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index ) 
    //     $pathInfo = pathinfo($currentPath);
    //     // output: localhost
    //     $hostName = $_SERVER['HTTP_HOST'];
    //     // output: http://
    //     $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
    //     // return: http://localhost/myproject/
    //     return $protocol.$hostName.$pathInfo['dirname']."/";
    // }
    
    
    
   
}
