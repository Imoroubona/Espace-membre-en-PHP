<?php 
 if ( !empty($_POST) && !empty($_POST['username']) && !empty($_POST['password']) ) {

 	require_once 'inc/db.php';
 	require_once 'inc/founctions.php';

 	$req = $pdo->prepare(" SELECT * FROM users WHERE (username=:username OR email = :username) AND confirmed_at IS NOT NULL");

 	$req->execute(['username'=>$_POST['username']]);

 	$user = $req->fetch();

 	session_start();

 	if(password_verify($_POST['password'], $user->password)){
          $_SESSION ['auth'] = $user;
          $_SESSION['flash']['success'] = "Vous êtes maintenamt connecté";
          header("Location:account.php");
          exit();
 	}else{
 		  $_SESSION['flash']['danger'] = " Identifiants incorrects ";
 	}

}

?>


 <?php  require_once 'inc/header.php';?>

 <h1>Se connecter </h1>
  
     <div class="col-md-4">
            <form action="" method="POST" >
         <div class="form-group">
            <label for="username" >Pseudo ou Email:</label>
            <input class="form-control" type="text" name="username" id="username" >
         </div>         

         <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input class="form-control" type="password" name="password" id="password">
         </div>
         
         <button class="btn btn-primary">Se connecter</button>
         </form>
    </div>
  
 <?php require_once 'inc/footer.php';?>