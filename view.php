<?php include('connexion.php'); 
$deleteId=$_GET['deleteId'];

if (!empty($_GET['deleteId'])) { $deleteId = $_REQUEST['deleteId']; } 
if (null == $deleteId) { header("location:indexvendeur.php"); } 
else { 
    $pdo = Database::connect();
    $sql = "SELECT * FROM article where articleId = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($deleteId));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
}




 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" media="screen" type="text/css" href="style.css" /> 
  
 
</head>
 
<body>
    <div class="table">
     
                <div class="span">
                    <div class="row">
                    <center><a href="https://fontmeme.com/polices/police-metal-gear-solid/"><img src="https://fontmeme.com/permalink/210101/d797d2e65084c902b65820cb516808a8.png" alt="police-metal-gear-solid" border="0"></a></center>
                    </div>
                     
                    <div class="form" >
                      <div class="control">
                      <label class="control-label"><a href="https://fontmeme.com/polices/police-metal-gear-solid/"><img src="https://fontmeme.com/permalink/210101/7885253ad898464cf218990b17900208.png" alt="police-metal-gear-solid" border="0"></a>:</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['autor'];?>
                            </label>
                        </div>
                      </div>

                      <div class="control">
                        <label class="control-label">Article:</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['article'];?>
                            </label>
                        </div>
                      </div>

                      
                        <div class="form-actions">
                        <center> <a class="btn" href="index.php"><img src="https://fontmeme.com/permalink/210101/4937b1d7bc3d7c3e7eb4afd97f7470a0.png" alt="police-metal-gear-solid" border="0"></a></a> </center>
                       </div>
                       <br>

                       
                       
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> 
  </body>

</html>