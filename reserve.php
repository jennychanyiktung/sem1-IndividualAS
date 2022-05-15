<!--Name : CHAN YIK TUNG, STUDENT ID: 21000500s -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve and Pick Up</title>
    <link rel="stylesheet" href="css/reserve2.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
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
    <?php 
    // start the session, remind the system to save the variable inside session
    session_start();
    
    ?>
    <!-- <div class="LL-conatiner"> -->
    <div class="L-container">
   
    <div class="S-container">
    <div class="wrapper">
        <h1>ABC Tech</h1>
        <h1 class="tittle">Reservation and Pick Up</h1>


        <form method="POST" action="validateForm.php" id="form">

            <div class="cover">


                <div class="field <?php if(isset($_SESSION['storeError'])){echo "error";}?>">
                <!-- first name field -->   
                    <label for="store">Store</label>
                    <select name="store" id="store" size="1">
                            <option value="" disabled selected> ---Select a store to pickup --- </option>
                            <!-- display the selected value inside the drop down menu if the $SESSION['store'] == particular value -->
                            <option value="1" <?php if(isset($_SESSION['store'])){if($_SESSION['store'] == 1){echo "selected";}}?> >IFC Mall</option>
                            <option value="2" <?php if(isset($_SESSION['store'])){if($_SESSION['store'] == 2){echo "selected";}}?> >Festiveal Walk</option>
                            <option value="3" <?php if(isset($_SESSION['store'])){if($_SESSION['store'] == 3){echo "selected";}}?> >Hysan place</option>
                            <option value="4" <?php if(isset($_SESSION['store'])){if($_SESSION['store'] == 4){echo "selected";}}?> >APM</option>
                    </select>
                    <?php if(isset($_SESSION['storeError'])){
                    echo "<small>".$_SESSION['storeError']."</small>";
                     // if detect problem from validateForm.php, the stored error message will be display here and style by the <small> tag
                }?>
                </div>
     

                <div class="field <?php if(isset($_SESSION['modelError'])){echo "error";}?>">
                <!-- Last name field -->   
                    <label for="model">Model</label>
                    <select name="model" id="store" size="1">
                            <option value="" disabled selected> ---Select a model --- </option>
                            <!-- display the selected value inside the drop down menu if the $SESSION['model'] == particular value -->
                            <option value="1" <?php if(isset($_SESSION['model'])){if($_SESSION['model'] == 1){echo "selected";}}?>>16GB</option>
                            <option value="2" <?php if(isset($_SESSION['model'])){if($_SESSION['model'] == 2){echo "selected";}}?>>32GB</option>
                            <option value="3" <?php if(isset($_SESSION['model'])){if($_SESSION['model'] == 3){echo "selected";}}?>>128GB</option>
                            <option value="4" <?php if(isset($_SESSION['model'])){if($_SESSION['model'] == 4){echo "selected";}}?>>256GB</option>

                           
                    </select>
                    <?php if(isset($_SESSION['modelError'])){
                    echo "<small>".$_SESSION['modelError']."</small>";
                    // if detect problem from validateForm.php, the stored error message will be display here and style by the <small> tag
                }?>
                </div>
                </div>
        
            
            <div class="dbl-field">
                <div class="field <?php if(isset($_SESSION['fnameError'])){echo "error";}?>">
                <!-- first name field -->   
                <label for="fname">First Name</label>
                <input id="fname" type="text" name="fname" placeholder=" First Name" value="<?php if(isset($_SESSION['fname'])){echo $_SESSION['fname'];}?>">
                <?php if(isset($_SESSION['fnameError'])){
                    echo "<small>".$_SESSION['fnameError']."</small>";
                     // if detect problem from validateForm.php, the stored error message will be display here and style by the <small> tag
                }?>
                </div>


                <div class="field <?php if(isset($_SESSION['lnameError'])){echo "error";}?>">
                <!-- Last name field -->   
                <label for="lname">Last Name</label>
                <input id="lname" type="text" name="lname" placeholder="Last Name" value="<?php if(isset($_SESSION['lname'])){echo $_SESSION['lname'];}?>">
                <?php if(isset($_SESSION['lnameError'])){
                    echo "<small>".$_SESSION['lnameError']."</small>";
                     // if detect problem from validateForm.php, the stored error message will be display here and style by the <small> tag
                }
                ?>
                </div>
            </div>    

            

            <div class="dbl-field">
                <div class="field <?php if(isset($_SESSION['dateError'])){echo "error";}?>">
                <!-- Date field -->   
                <label for="date">Date</label>
                <input id="date" type="date" name="date" value="<?php if(isset($_SESSION['date'])){echo $_SESSION['date'];}?>">
                <?php if(isset($_SESSION['dateError'])){
                    echo "<small>".$_SESSION['dateError']."</small>";
                     // if detect problem from validateForm.php, the stored error message will be display here and style by the <small> tag
                }
                ?>
                </div>

                <div class="field <?php if(isset($_SESSION['mobileError'])){echo "error";}?>">
                <!-- MObile field -->   
                <label for="mobile">Mobile</label>
                <input id="mobile" type="text" name="mobile" placeholder="xxxx-xxxx" value="<?php if(isset($_SESSION['mobile'])){echo $_SESSION['mobile'];}?>">
                <?php if(isset($_SESSION['mobileError'])){
                    echo "<small>".$_SESSION['mobileError']."</small>";
                     // if detect problem from validateForm.php, the stored error message will be display here and style by the <small> tag
                }
                ?>
                </div>
            </div>

            <div class="email" >
            <div class="field <?php if(isset($_SESSION['emailError'])){echo "error";}?>">
                <!-- Email field -->   
                <label for="email">Email</label>
                <input id="email" type="text" name="email" placeholder="xxx@example.com" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email']; }?>">
                <?php if(isset($_SESSION['emailError'])){
                    echo "<small>".$_SESSION['emailError']."</small>";
                     // if detect problem from validateForm.php, the stored error message will be display here and style by the <small> tag
                }
                ?>
            </div>
            </div>
           

                

                <div class="btn">
                    <button type="button" id ="reset">Reset</button>
                    <button type="submit" >Submit</button>
                </div>
            
            </div>
        </form>
       

    </div>
    </div>
    </div>
    </div>
 
    
    <script>
       
    </script>
    
    <script src="script.js"></script>
    
</body>
</html>