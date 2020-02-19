 <?php 
   session_start(); 
   require_once 'inc/founctions.php';
   require_once 'inc/header.php';
   logged_only(); 

 ?>


  
 <h1>Votre compte</h1>
  
  <?php debug($_SESSION); ?>
  
 <?php require_once 'inc/footer.php';?>





