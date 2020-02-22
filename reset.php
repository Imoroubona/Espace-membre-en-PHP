<?php 
if (isset($_GET['id']) && isset($_GET['token'])) {
    require_once 'inc/db.php';
    require_once 'inc/founctions.php';
   $req =  $pdo->prepare(" SELECT * FROM users WHERE id = ? AND reset_token IS NOT NULL AND reset_token = ? AND reset_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE)");
   $req->execute([$_GET['id'], $_GET['token']]);
   $user = $req->fetch();
   if ($user) {
      if (!empty($_POST['password']) && $_POST['password'] == $_POST['password_confirm'] ) {
         $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
         $pdo->prepare("UPDATE users SET password = ?, reset_at = NULL, reset_token = NULL")->execute([$password]);
         session_start();
         $_SESSION['flash']['success'] = "Votre mot de passe a été bien réinitialisé";
         $_SESSION['auth'] = $user;
         header("Location:account.php");
         exit();
      }
   } else {
         session_start();
         $_SESSION['flash']['danger'] = "Ce token n'est valide";
         header("Location:login.php");
         exit();
   }
   
} else {
      header("Location:login.php");
      exit();
}


?>


 <?php  require_once 'inc/header.php';?>

 <h1>Réinitialisation du mot de passe</h1>
  
     <div class="col-md-4">
            <form action="" method="POST" >

         <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input class="form-control" type="password" name="password" id="password">
         </div>
         <div class="form-group">
            <label for="password_confirm">Confirmation du mot de passe:</label>
            <input class="form-control" type="password" name="password_confirm" id="password_confirm">
         </div>
         
         <button class="btn btn-primary">Réinitialiser mon mot de passe</button>
         </form>
    </div>
  
 <?php require_once 'inc/footer.php';?>