<!--Name : CHAN YIK TUNG, STUDENT ID: 21000500s -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/datadisplay.css">
    <title>Document</title>
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
    <form  method="POST">
        <h1>Select and Press Submit</h1>
        <div class="dbl-field">
            <div class="wrapper"> 
                <!-- three choice of sorting -->
                <input type="radio" name="field" value="date" id="date" class="radio__input">
                <label for="date" class="radio__label">Pick Up Date</label>
        
                <input type="radio" name="field" value="lname" id="lname" class="radio__input">
                <label for="lname" class="radio__label">Last Name</label>

                <input type="radio" name="field" value="fname" id="fname" class="radio__input">
                <label for="fname" class="radio__label">First Name</label>
            
            </div>

            <div class="field">
                <!-- search from phone number -->
                <div class="input-data">
                    <input type="text" class="effect-1" name="number" value="<?php if(isset($_POST['number'])){echo $_POST['number'];}?>" id="number" placeholder="Phone number">
                    <label for=""></label>
                </div>
            </div>

            <div class="button">
            <button type="submit" name="submit">Submit</button>
            
            </div>
        </div>
    </form>
   
    <div class="container">
    <table class="content-table">
    <thead>
        <tr>
            <th >Id</th>
            <th >Store</th>
            <th >Model</th>
            <th >First Name</th>
            <th >Last Name</th>
            <th >Email</th>
            <th >Mobile</th>
            <th >Pickup Date</th>
        </tr>
    </thead>

<?php 
// connect to database and using pdo method
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'sehs4517';
    // Set DNS
    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
    //create a PDO instance
    $pdo = new PDO($dsn, $user, $password);
   
//if there has a submit is detected
  if(isset($_POST['submit'])){
      if(!empty($_POST['field'])&& isset($_POST['field'])){  //the 'field' have value and detected
        if($_POST['field']=='lname'){                         // the 'field ' is equal to lname
            $stmt = $pdo->query('SELECT * FROM reservation order by lname asc'); // then do the query
            show($stmt);
        }

        if($_POST['field']=='date'){                            // the 'field ' is equal to date
            $stmt = $pdo->query('SELECT * FROM reservation order by pickup asc');   // then do the query
            show($stmt);
        }

        if($_POST['field']=='fname'){                                 // the 'field ' is equal to fname
            $stmt = $pdo->query('SELECT * FROM reservation order by fname asc');     // then do the query
            show($stmt);
        }
    }
      elseif(!empty($_POST['number'] && isset($_POST['number']))){      //the 'number' have value and detected
        $number= $_POST['number'];                                      //set the $number variable to store the form's number input
        $stmt = $pdo->prepare('SELECT * FROM reservation where mobile = :mobile'); //search for the equal phone number
        $stmt->execute(['mobile' => $number]);
        if ($stmt->rowCount() > 0) { // if the result is not empty then it will larger than 0
            show($stmt);
          } 
      else{
            echo "<tr><td colspan='8' class='colsp'>No record is found</td></tr>"; //if the search result is empty, then print 'No record is found'
          }
      }else{
          echo  "<tr><td colspan='8' class='colsp'>No record is found</td></tr>"; //if the  the number field is empty and the input is '0', show no record is found
      }
     

      

  } else{ // if the submit button is not press

    $stmt = $pdo->query('SELECT * FROM reservation'); //display table order by ID by defealt
    show($stmt);
  }
 
  
?>

</table>
</div>
</div>
</body>
</html>

<?php 
 function show($stmt){
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
        echo "<td class='col'>".$row['id']."</td>";

        echo "<td>".$row['store']."</td>";
       
        echo "<td>".$row['model']."</td>";
        
        echo "<td>".$row['fname']."</td>";
        
        echo "<td>".$row['lname']."</td>";
      
        echo "<td>".$row['email']."</td>";
        
        echo "<td>".$row['mobile']."</td>";
       
        echo "<td>".$row['pickup']."</td>";
        echo "</tr>";
    }   
 }
?>