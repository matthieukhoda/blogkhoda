<?php 

include 'connexion.php';

if ( !empty($_POST)) {
// Saisie des erreurs de validation

$brandsError = null;

// Saisie des valeurs d‘entrée

$brands = $_POST['brands'];



$valid = true;
if (empty($brands)) {
$brandsError = 'Créer votre catégorie';
$valid = incorrect;
}






// Entrer des données
if ($valid) {
     $pdo = Database::connect();
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "INSERT INTO article (brands) values(?)";
     $q = $pdo->prepare($sql);
     $q->execute(array($brands));
     Database::disconnect();
     header("Location: categories.php");
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
<h4>Publier un article</h4>
</div>

<form class="form-horizontal" action="createcategories.php" method="post">






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
<button type="submit" class="btn">Créer</button>
</div>
<br>
<div class="form-actions">
<a class="btn1" href="categories.php">Retour</a>
</div>
</form>
</div>

</div> 
</body>
</html>