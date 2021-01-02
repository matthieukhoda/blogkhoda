<?php 

include 'connexion.php';

if ( !empty($_POST)) {
// Saisie des erreurs de validation
$autorError = null;
$articleError = null;
$brandsError = null;

// Saisie des valeurs d‘entrée
$autor = $_POST['autor'];
$article = $_POST['article'];
$brands = $_POST['brands'];

$valid = true;
if (empty($autor)) {
$autorError = 'Veuillez entrer un nom';
$valid = incorrect;
}

$valid = true;
if (empty($brands)) {
$brandsError = 'Créer votre catégorie';
$valid = incorrect;
}

$valid = true;
if (empty($article)) {
$articleError = 'Ecrivez votre article';
$valid = incorrect;
}




// Entrer des données
if ($valid) {
     $pdo = Database::connect();
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "INSERT INTO article (autor,article,brands) values(?, ?, ?)";
     $q = $pdo->prepare($sql);
     $q->execute(array($autor,$article,$brands));
     Database::disconnect();
     header("Location: index.php");
}
      }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container">

<div class="span">
<div class="row">
<center><img src="https://fontmeme.com/permalink/210102/bbf5bc4f4fa95835e303210ffcce82c8.png" alt="police-metal-gear-solid" border="0"></a> </center>
</div>

<form class="form-horizontal" action="createarticle.php" method="post">

<div class="form-group <?php echo !empty($autorError)?'has-error':'';?>">
    <label class="control-label">Auteur</label>
<div class="controls">
    <input name="autor" type="text" placeholder="Auteur" value="<?php echo !empty($autor)?$autor:'';?>">
    <?php if (!empty($autorError)): ?>
    <span class="help-inline"><?php echo   $autorError;?></span>
    <?php endif; ?>
</div>
</div>


<div class="form-group <?php echo !empty($articleError)?'has-error':'';?>">
<label class="control-label">Article</label>
<div class="controls">
<textarea cols="200" rows="30" name="article" type="text" placeholder="Article" value="<?php echo !empty($article)?$article:'';?>"></textarea>
<?php if (!empty($articleError)): ?>
<span class="help-inline"><?php echo   $articleError;?></span>
<?php endif;?>
</div>
</div>

<div class="form-group <?php echo !empty($brandsError)?'has-error':'';?>">
<label class="control-label">Catégorie</label>
<div class="controls">
<input name="brands" type="text" placeholder="Catégorie" value="<?php echo !empty($brands)?$brands:'';?>">
<?php if (!empty($brandsError)): ?>
<span class="help-inline"><?php echo   $brandsError;?></span>
<?php endif;?>
</div>
</div>




<br>

<div class="form-actions">
<button type="submit" class="btn"><img src="https://fontmeme.com/permalink/210102/01725393b54de46f96711aeff282e0da.png" alt="police-metal-gear-solid" border="0"></a></button>
</div>
<br>
<div class="form-actions">
<a class="btn1" href="index.php"><img src="https://fontmeme.com/permalink/210102/36fecadec7d03b95c1bfc27f86a5c2f0.png" alt="police-metal-gear-solid" border="0"></a></a>
</div>
</form>
</div>

</div> 
</body>
</html>