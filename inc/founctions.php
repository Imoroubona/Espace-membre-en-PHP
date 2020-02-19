<?php 

    function debug($variable){
    	echo '<pre>'.print_r($variable, true).'</pre>';
    } 


    function str_random($length){
    	$alphabet = "adadgsgreq40542379057-06urlgngm;ljhLGSTHORRHRLTT,LGNM,KGFNMK";
    	return  substr(str_shuffle(str_repeat($alphabet, $length)), 0, 60);
    }


    function logged_only(){
        
        if (session_status() == PHP_SESSION_NONE) {
             session_start();
        }

    	if (!isset($_SESSION['auth'])) {
   	    $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page";
   	    header("Location:login.php");
   	    exit();
   	  }
    }

?>