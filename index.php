<!--Name : CHAN YIK TUNG, STUDENT ID: 21000500s -->
<?php 
session_start();
session_unset();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/index.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>SmartPhone4517</title>
</head>
<body>
    <div class="container">
        <!-- nav bar from the top -->
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


        <div class="row">
            <!-- information about the product -->
            <div class="col-1">
                <h2>iPhone Air <br>Apple M1 chip</h2>
                <h3>12MP Ultra Wide fronet camera with Center Stage</h3>
                <p>Blazing-fast 5G</p>
                <h4>$4799</h4>

              
                <a href="reserve.php">
                <button type="button"> Reserve Now <img src="img/arrow.png" alt=""></button>
                </a>

            </div>
            <div class="col-2">
                <img src="img/ipadred.png" class="controller" alt="">
                <div class="color-box"></div>
            </div>
        </div>
    </div>
    
</body>
</html>