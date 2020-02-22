<?php 
 if ( !empty($_POST) && !empty($_POST['email'])) {

 	require_once 'inc/db.php';
 	require_once 'inc/founctions.php';

 	$req = $pdo->prepare(" SELECT * FROM users WHERE email = ? AND confirmed_at IS NOT NULL");

 	$req->execute([$_POST['email']]);

 	$user = $req->fetch();

 	if($user){
         session_start();
          $reset_token = str_random(60);
          $pdo->prepare("UPDATE users SET reset_token = ?, reset_at = NOW() WHERE id = ?")->execute([$reset_token], [$user->id]);

          mail($_POST['email'], "Réinitialisation de votre mot de passe", "Afin de valider votre compte, merci de clicquer sur ce lien\n\nhttp://localhost/Espace-membre-en-PHP/reset.php?id=[$user->id]&token=$reset_token");

          $_SESSION['flash']['success'] = "Les instructions du rappel de mot de passe vous sont envoyées par email";

          
          header('Location:login.php');
          exit();
 	}else{
 		     $_SESSION['flash']['danger'] = "Aucun compte ne correspond à cet email";
 	}

}

?>


 <?php  require_once 'inc/header.php';?>

 <h1>Mot de passe oublié</h1>
  
     <div class="col-md-4">
        <form action="" method="POST" >
          <div class="form-group">
              <label for="email"> Email:</label>
              <input class="form-control" type="email" name="email" id="email">
          </div>         
           
          <button class="btn btn-primary">
            Réinitialiser le mot de passe
          </button>
        </form>
    </div>
  
 <?php require_once 'inc/footer.php';?>