<?php 

    function debug($variable){
    	echo '<pre>'.print_r($variable, true).'</pre>';
    } 


    function str_random($length){
    	$alphabet = "adadgsgreq40542379057-06urlgngm;ljhLGSTHORRHRLTT,LGNM,KGFNMK";
    	return  substr(str_shuffle(str_repeat($alphabet, $length)), 0, 60);
    }

?>