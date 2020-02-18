<?php require 'inc/header.php'; ?>

<h1>S'inscrire</h1>
<?php if (!empty($errors)):?>

<div class="alert alert-danger">

   <p>Vous n'avez pas rempli le formulaire correctement</p>
   <ul>
      <?php  foreach($errors as $error): ?>
             <li><?=$error; ?></li>
      <?php endforeach;?>
   </ul>
</div>
<?php endif; ?>
<div class="col-md-4">
            <form action="" method="POST" >
         <div class="form-group">
            <label for="username" >Pseudo:</label>
            <input class="form-control" type="text" name="username" id="username" >
         </div>

         <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" type="text" name="email" id="email">
         </div>

         <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input class="form-control" type="password" name="password" id="password">
         </div>

         <div class="form-group">
            <label for="password_confirm">Confirmer Mot de passe:</label>
            <input class="form-control" type="password" name="password_confirm" id="password_confirm">
         </div>
         <button class="btn btn-primary">M'inscrire</button>
         </form>
</div>

