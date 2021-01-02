<?php
    include 'connexion.php';
    $deletecity=$_GET['deletebrands'];
    
     
    if ( !empty($_GET['deletebrands'])) {
        $id = $_REQUEST['deletebrands'];
    }
     
    if ( !empty($_GET)) {
        
        $id = $_GET['deletebrands'];
        
         
        // delete data
        $pdo = Database::connect();
        
        $sql = "DELETE FROM article WHERE brands= ?";
        $q = $pdo->prepare($sql);
        
        $q->execute(array($deletebrands));
        Database::disconnect();
        header("Location: categories.php");
         
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
                     
                    <form class="form-horizontal" action="deletecategories.php" method="get">
                      <input type="hidden" name="deletebrands" 
                      value="<?php echo $deletebrands;?>"/>
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