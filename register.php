<?php require 'inc/header.php'; ?>



    <?php 

         if (!empty($_POST)) {
            $errors = array();

        //Connexion à la base des données
            require_once('inc/db.php');

        //Validation of posted username

            if (empty($_POST['username']) || !preg_match('/^[a-z0-9-_]+$/i', $_POST['username'])) {

            	$errors['username'] = "Votre pseudo n'est valide";
            }else{
                $req = $pdo->prepare("SELECT id FROM users WHERE username = ?");
                $req->execute(array($_POST['username']));

                $user = $req->fetch();

               if ($user) {
                   $errors['username'] = "Ce nom existe déjà";
               }

            }

        //Validation of posted email


            if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
         	     
         	     $errors['email'] = "Votre email n'est pas valide";
            }else{
                $req = $pdo->prepare("SELECT id FROM users WHERE email = ?");
                $req->execute(array($_POST['email']));

                $email = $req->fetch();

               if ($email) {
                   $errors['email'] = "Cet email existe déjà";
               }
            }
        //Validation de mot de passe

            if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
            	$errors['password'] = " Vous devez entrer un mot de passe valide ";
            }


            if (empty($errors)) {

            

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