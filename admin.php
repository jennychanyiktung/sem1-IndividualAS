<!--Name : CHAN YIK TUNG, STUDENT ID: 21000500s -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/admin2.css">
    <div class="navbar">
            
            <nav>
                <ul>
                    <li><a href="">ipad</a></li>
                    <li><a href="index.php">iPhone</a></li>
                    <li><a href="">Mac</a></li>
                    <li><a href="admin.php"> <img src="img/account (1).png"/></a></li>
                </ul>
                
            </nav>
           
        </div>
</head>
<body>
<div class="body">
    <div class="wrapper">
    <header>Account</header>
    <form action="admin.php" method="POST">
      <div class="dbl-field">
          <div class="field">
              <input type="text" placeholder="username" value="" name="username">   
          </div>
          <div class="field">
              <input type="password" placeholder="password" value="" name="password">
          </div>
      </div>

      <div class="button-area">
      <button type="submit">Submit</button>
      <span><a href="">Forgot password?</a></span>
      
      </div>
     
      </form>
    </div>
    </div>
    
</body>
</html>
<?php
    if(isset($_POST['username']) && isset($_POST['password'])){
        if( $_POST['username'] =='admin' && $_POST['password'] == 'pass'){
            header("Location: datadisplay.php");
        }else{
            echo "<script>alert('wrong'); </script>";  
        }
        
    }
    
    
?>