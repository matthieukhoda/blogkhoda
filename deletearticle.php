<?php
    include 'connexion.php';
    $deleteId=$_GET['deleteId'];
    
     
    if ( !empty($_GET['deleteId'])) {
        $id = $_REQUEST['deleteId'];
    }
     
    if ( !empty($_GET)) {
        
        $id = $_GET['deleteId'];
        
         
        // delete data
        $pdo = Database::connect();
        
        $sql = "DELETE FROM article WHERE articleId= ?";
        $q = $pdo->prepare($sql);
        
        $q->execute(array($deleteId));
        Database::disconnect();
        header("Location: index.php");
         
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
   
</head>
 
<body>
    <div class="container">
     
                <div class="span">
                    <div class="row">
                        <h3>Effacer un article</h3>
                    </div>
                     
                    <form class="form-horizontal" action="deletearticle.php" method="get">
                      <input type="hidden" name="deleteId" 
                      value="<?php echo $deleteId;?>"/>
                      <p class="alert">Etes vous sûr ?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn">Oui</button>
                          <a class="btn" href="index.php">Non</a>
                        </div>
                    </form>
                </div>
                 
    </div> 
  </body>
</html>