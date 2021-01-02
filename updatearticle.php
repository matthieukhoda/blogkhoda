<?php
    include 'connexion.php';
    $deleteId=$_GET['deleteId'];
 
    $deleteId = null;
    if ( !empty($_GET['deleteId'])) {
        $deleteId = $_REQUEST['deleteId'];
    }
     
    if ( null==$deleteId) {
        header("Location: index.php");
    }
     

    
         
        // update data
        if (!empty($_POST)) {
            $autor=$_POST['autor'];
            $article=$_POST['article'];
            $brands=$_POST['brands'];
            
            $pdo = Database::connect();
            
            $sql = "UPDATE article  set autor= ?, article= ?, brands= ? WHERE articleId= ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($autor,$article,$brands,$deleteId));
            Database::disconnect();
            
        }
    
    else {
        $pdo = Database::connect();
        
        $sql = "SELECT * FROM article where articleId = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($deleteId));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $autor = $data['autor'];
        $article = $data['article'];
        $brands = $data['brands'];
       
        Database::disconnect();
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    
</head>
 
<body>
    <div class="table">
     
                <div class="span">
                    <div class="row">
                    <center><img src="https://fontmeme.com/permalink/210102/9c8a06df492eeec646c75654ea7308ba.png" alt="police-metal-gear-solid" border="0"></a></center>
                    </div>
             
                    <form class="group" action="updatearticle.php?deleteId=<?php echo $deleteId?>" method="post">
                      <div class="group <?php echo !empty($autorError)?'error':'';?>">
                        <label class="control">Auteur:</label>
                        <div class="control">
                            <input name="autor" type="text"   value="<?php 
                            echo $autor;?>">
                            <?php if (!empty($autorError)): ?>
                                <span class="help-inline"><?php echo $autorError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="group <?php echo !empty($articleError)?'error':'';?>">
                        <label class="control">Article:</label>
                        <div class="control">
                        <form action="">
                            <input name="article" type="text"  value="<?php 
                            echo ($article)?$article:'';?>">
                            <?php if (!empty($articleError)): ?>
                                <span class="help-inline"><?php echo $articleError;?></span>
                            <?php endif; ?>
                            </form>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($brandsError)?'error':'';?>">
                        <label class="control">Catégorie:</label>
                        <div class="control">
                            <input name="brands" type="text"   value="<?php 
                            echo !empty($brands)?$brands:'';?>">
                            <?php if (!empty($brandsError)): ?>
                                <span class="help-inline"><?php echo $brandsError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                 
                      <br>
                      <div class="control">
                          <button onclick="alert('Votre article a été mis à jour.')" 
                          type="submit" class="button" ><img src="https://fontmeme.com/permalink/210102/71486071f8da971fb9f23c6b2503e2c4.png" alt="police-metal-gear-solid" border="0"></a></button>
                          </div>
                        <div class="control" >
                          <a class="btnn" href="index.php" ><img src="https://fontmeme.com/permalink/210102/5de60418a8552c659b1df0cba3f9d1c9.png" alt="police-metal-gear-solid" border="0"></a></a>
                        </div>
                    </form>
                </div>
                 
    </div> 
  </body>
</html>