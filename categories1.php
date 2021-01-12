<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">

<link rel="stylesheet" media="screen" type="text/css" href="style.css" /> 

</head>

<body>

<div class="container">
<div class="row">

<center><a href="https://fontmeme.com/polices/police-metal-gear-solid/"><img src="https://fontmeme.com/permalink/210101/704954d36bf298692e3dec987d3ad241.png" alt="police-metal-gear-solid" border="0"></a></center>
</div>
<div class="row2">
<img class="cate" src="../Blog1/images/cate.jpg" alt="">

<p>
  <!-- <a href="createcategories.php" class="btn">Créer une catégorie</a> -->
</p>
<table class="table">
<thead>
  <tr>
   

    
    
  </tr>
</thead>
<body>


<?php 
include 'connexion.php';
$pdo = Database::connect();
$sql = 'SELECT * FROM article ORDER BY brands DESC';
foreach ($pdo->query($sql) as $row) {
echo '<tr>';

echo '<td>' . $row['brands'] . '</td>';
?>




<?php
echo '</tr>';

}
Database::disconnect();
?>
</tbody>
</table>
</div>
</div> 
<div class="form-actions">
<a class="btn1" href="index.php"><img src="https://fontmeme.com/permalink/210101/4937b1d7bc3d7c3e7eb4afd97f7470a0.png" alt="police-metal-gear-solid" border="0"></a></a>
</div>
</body>

</html>