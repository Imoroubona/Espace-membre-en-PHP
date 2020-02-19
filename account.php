 <?php 
   require_once 'inc/founctions.php';
   logged_only();

   if (!empty($_POST)) {
      if ( $_POST['password'] != $_POST['password_confirm']) {
          $_SESSION['flash']['error'] = "Les mots de passe ne se correspondent pas";
      }else{
          $user_id = $_SESSION['auth']->id;
          $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
          require_once 'inc/db.php';
          $req = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
          $req->execute([$password, $user_id]);
          $_SESSION['flash']['success'] = "Votre mot de passe a été mis à jour";
      }
   }

  require_once 'inc/header.php';
 ?>


  
 <h1>Bonjour <?= $_SESSION['auth']->username ;?></h1>
  
  <form action="" method="POST">
  	<div class="col-md-4">
  		<div class="form-group">
  		   <input class = 'form-control' type="password" name="password" placeholder="Changer votre mot de passe">
  	</div>
  	<div class="form-group">
  		   <input class = 'form-control' type="password" name="password_confirm" placeholder="Confirmer votre nouveau mot de passe">
  	</div>
    <button class="btn btn-primary">Changer mot de passe</button>
  	</div>
  </form>
  
 <?php require_once 'inc/footer.php';?>





