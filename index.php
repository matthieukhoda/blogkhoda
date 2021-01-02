<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">

<link rel="stylesheet" media="screen" type="text/css" href="style.css" /> 

</head>

<body>
<div class="container">
<div class="row">
<center><a href="https://fontmeme.com/polices/police-metal-gear-solid/"><img src="https://fontmeme.com/permalink/210101/6caef6b24bf7e2eb564b80f86eb25676.png" alt="police-metal-gear-solid" border="0"></a></center>
</div>
<div class="row3">
<p>
  <a href="createarticle.php" ><img src="https://fontmeme.com/permalink/210102/a01c4e99e3b443e1b0893dbf7f512062.png" alt="police-metal-gear-solid" border="0"></a></a>
</p>
<p>
  <a href="categories.php" ><img src="https://fontmeme.com/permalink/210102/ddbf0219fd168419ba3f17de6d6b8c74.png" alt="police-metal-gear-solid" border="0"></a></a>
</p>
<p>
<a href="logout.php" ><img src="https://fontmeme.com/permalink/210102/98de47699c887991021ab53dd2ab3c5a.png" alt="police-metal-gear-solid" border="0"></a></a>
</p>
<table class="table">
<thead>
  <tr>
    <th><img src="https://fontmeme.com/permalink/210101/af6cb2d8725e115d8e1ff8d285ebd588.png"</th>
    <th><img src="https://fontmeme.com/permalink/210101/58e2d86c53acdda4abba90ac863fcb5c.png"</th>
    <th><img src="https://fontmeme.com/permalink/210101/e8360e6bd79bad3b92abb1b69dbe97eb.png"</th>
    <th><img src="https://fontmeme.com/permalink/210101/43907eda29faf17413ed914034585fad.png"</th>
    
  </tr>
</thead>
<body>


<?php 
include 'connexion.php';
$pdo = Database::connect();
$sql = 'SELECT * FROM article ORDER BY autor,article,brands DESC';
foreach ($pdo->query($sql) as $row) {
echo '<tr>';
echo '<td>' . $row['autor'] . '</td>';
echo '<td>' . $row['article'] . '</td>';
echo '<td>' . $row['brands'] . '</td>';
?>

<td> <a class = "button" href="view.php?deleteId=<?php echo $row['articleId'];?>"><img src="https://fontmeme.com/permalink/210102/a468c07fe2e8833fc92c84fa162324d5.png" alt="police-metal-gear-solid" border="0"></a></a> </td>
<td> <a class = "button" href="updatearticle.php?deleteId=<?php echo $row['articleId'];?>"><img src="https://fontmeme.com/permalink/210102/6a549e6a4a9ecbef02defcee70b43dd1.png" alt="police-metal-gear-solid" border="0"></a></a> </td>
<td> <a class = "button" href="deletearticle.php?deleteId=<?php echo $row['articleId'];?>"><img src="https://fontmeme.com/permalink/210102/a7c31754dc4d4eb90608bfc02190d97e.png" alt="police-metal-gear-solid" border="0"></a></a> </td>


<?php
echo '</tr>';

}
Database::disconnect();
?>
</tbody>
</table>
</div>
</div> 
</body>

</html>