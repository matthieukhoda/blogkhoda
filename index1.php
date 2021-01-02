<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">

<link rel="stylesheet" media="screen" type="text/css" href="style.css" /> 

</head>
<a class="punk" href="https://fontmeme.com/polices/police-metal-gear-solid/"><img src="https://fontmeme.com/permalink/210101/a28fe5430cc5b7d66e8dd9a76e0d7d97.png" alt="police-metal-gear-solid" border="0"></a>
<img class="cyber" src="../Blog1/images/punk.jpg" alt="">
<body>
<div class="row1">
<p>
  
 <center><a href="login.php" href="https://fontmeme.com/polices/police-metal-gear-solid/"><img src="https://fontmeme.com/permalink/210101/aeea4eed2af023aa24b8c7257b786022.png" alt="police-metal-gear-solid" border="0"></a></center>
</p>
<p>
  
 <center><a href="categories1.php" href="https://fontmeme.com/polices/police-metal-gear-solid/"><img src="https://fontmeme.com/permalink/210101/ab3ecae0416e2bdb27858cc76a0428cb.png" alt="police-metal-gear-solid" border="0"></a></center>
</p>
</div>

<div class="container">

<div class="row">

</div>

<table class="table">
<thead>
  <tr>
    <th><img src="https://fontmeme.com/permalink/210101/af6cb2d8725e115d8e1ff8d285ebd588.png"</th>
    
    <th><img src="https://fontmeme.com/permalink/210101/58e2d86c53acdda4abba90ac863fcb5c.png"</th>
   
    <th><img src="https://fontmeme.com/permalink/210101/e8360e6bd79bad3b92abb1b69dbe97eb.png" </th>
    
    <th><img src="https://fontmeme.com/permalink/210101/43907eda29faf17413ed914034585fad.png" </th>
    
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

<td> <a class = "button" href="view1.php?deleteId=<?php echo $row['articleId'];?>"><img src="https://fontmeme.com/permalink/210101/138aad2b2aeccaaae001129316c08e00.png" </a> </td>




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

<?php
// On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}
// On se connecte à là base de données
require_once('connexion.php');

// On détermine le nombre total d'articles
$sql = 'SELECT COUNT(*) AS autor FROM `article`;';

// On prépare la requête
$query = $pdo->prepare($sql);

// On exécute
$query->execute();

// On récupère le nombre d'articles
$result = $query->fetch();

$nbArticles = (int) $result['autor'];

// On détermine le nombre d'articles par page
$parPage = 10;

// On calcule le nombre de pages total
$pages = ceil($nbArticles / $parPage);

// Calcul du 1er article de la page
$premier = ($currentPage * $parPage) - $parPage;

$sql = 'SELECT * FROM `autor` ORDER BY `created_at` DESC LIMIT :premier, :parpage;';

// On prépare la requête
$query = $pdo->prepare($sql);

$query->bindValue(':premier', $premier, PDO::PARAM_INT);
$query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

// On exécute
$query->execute();

// On récupère les valeurs dans un tableau associatif
$articles = $query->fetchAll(PDO::FETCH_ASSOC);

// require_once('close.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <!-- <main class="container">
        <div class="row">
            <section class="col-12">
                <!-- <h1>Liste des articles</h1>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Date</th>
                    </thead> -->
                    <tbody>
                        <?php
                        foreach($articles as $article){
                        ?>
                            <tr>
                                <td><?= $article['id'] ?></td>
                                <td><?= $article['titre'] ?></td>
                                <td><?= $article['created_at'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <nav>
                    <ul class="pagination">
                        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a href="./?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                        </li>
                        <?php for($page = 1; $page <= $pages; $page++): ?>
                          <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                          <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                <a href="./?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                            </li>
                        <?php endfor ?>
                          <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                          <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a href="./?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                        </li>
                    </ul>
                </nav>
            </section>
        </div>
    </main> 
</body>
</html>