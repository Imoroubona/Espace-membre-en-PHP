<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Super projet</title>
    <link rel="stylesheet" href="css/app.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark">
  <a class="navbar-brand" href="#">Mon super projet</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <?php if(isset($_SESSION['auth'])):?>
       
       <a class="nav-link" href="logout.php">Se déconnecter<span class="sr-only">(current)</span></a>
        </li>
      <?php else: ?>
          <a class="nav-link" href="register.php">S'inscrire<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Se connecter</a>
        </li>
      <?php endif;?> 
    </ul>    
  </div>
</nav>

<div id="container">
<?php if(isset($_SESSION['flash'])): ?>
  <?php foreach ($_SESSION['flash'] as $type => $message): ?>
    <div class="alert alert-<?=$type;?>">
      <?=$message;?>
    </div>
  <?php endforeach;?>
  <?php unset($_SESSION['flash']);?>
<?php endif ; ?>