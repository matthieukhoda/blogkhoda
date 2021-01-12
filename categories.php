<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">

<link rel="stylesheet" media="screen" type="text/css" href="style.css" /> 

</head>

<body>
<div class="container">
<div class="row">
<center><img src="https://fontmeme.com/permalink/210102/4cdf158974004fce1ba6503eeae834e8.png" alt="police-metal-gear-solid" border="0"></a></center>
</div>
<div class="row4">
<p>
 <center><a href="createcategories.php" ><img src="https://fontmeme.com/permalink/210102/72920112effefbba19342f9494d807d4.png" alt="police-metal-gear-solid" border="0"></a></a> </center>
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


<td> <a class = "button" href="deletecategories.php?deletebrands=<?php echo $row['brands'];?>"><img src="https://fontmeme.com/permalink/210102/a7c31754dc4d4eb90608bfc02190d97e.png" alt="police-metal-gear-solid" border="0"></a></a> </td>
</a> </td>


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
<a class="btn1" href="index1.php">Retour</a>
</div>
</body>

</html>