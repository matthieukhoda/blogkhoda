<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<img class="connect" src="../Blog1/images/connect.jpg" alt="">
<?php
require('config.php');
session_start();
if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['username'] = $username;
      header("Location: index.php");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>
<form class="box" action="" method="post" name="login">

<h1 class="box-title"><a href="https://fontmeme.com/polices/police-metal-gear-solid/"><img src="https://fontmeme.com/permalink/210101/4f5ba6cb5a5aab5e252fe3ebbe590b57.png" alt="police-metal-gear-solid" border="0"></a></h1>
<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
<input type="password" class="box-input" name="password" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<!-- <p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p> -->
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>

</body>
<a class="btn1" href="index1.php"><img src="https://fontmeme.com/permalink/210101/5c4ca3b185e29a17d48dc18921cfb22c.png" alt="police-metal-gear-solid" border="0"></a></a>
</html>