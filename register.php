<?php require 'inc/header.php'; ?>


    <?php 

         if (!empty($_POST)) {
            $errors = array();
        //Validation of posted username

            if (empty($_POST['username']) || !preg_match('/^[a-z0-9-_]+$/i', $_POST['username'])) {

            	$errors['username'] = "Votre pseudo n'est valide";
            }

        //Validation of posted email


            if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
         	     
         	     $errors['email'] = "Votre email n'est pas valide";
            }
        //Validation de mot de passe

            if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
            	$errors['password'] = " Vous devez entrer un mot de passe valide ";
            }

            if (empty($errors)) {

            //Connexion à la base des données
                require_once('inc/db.php');

            //Préparations et insertions des réquêtes dans la base des données

                $req = $pdo->prepare("INSERT INTO users SET username = ?, email = ?, password = ?");

                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

                $req->execute(array($_POST['username'], $_POST['email'], $password)); 
                
                die('Votre compte a bien été créé'); 
            }
            

            debug($errors);

            
         }


    ?>

<?php require 'inc/form.php';?>  
<?php require 'inc/footer.php';?>