<!--Name : CHAN YIK TUNG, STUDENT ID: 21000500s -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/fancy.css">
    <title>Document</title>
</head>
<body>
    

<?php

/* Name: CHAN YIK TUNG, Student ID: 21000500s */

session_start(); // start the session
unset(
    $_SESSION['fnameError'],
    $_SESSION['lnameError'],
    $_SESSION['dateError'],
    $_SESSION['mobileError'],
    $_SESSION['emailError'],
    $_SESSION['storeError'],
    $_SESSION['modelError'],
);
unset(
    $_SESSION['store'],
    $_SESSION['model'],
    $_SESSION['fname'],
    $_SESSION['lname'],
    $_SESSION['date'],
    $_SESSION['mobile'],
    $_SESSION['email']
);


function is_date($str){  //check dpick up date must be after the submission date
    try{
        $dt= new DateTime( trim($str));
    }
    catch(Exception $e){
        return false;
    }
    $month =$dt->format('m');
    $day = $dt->format('d');
    $year = $dt->format('Y');//yyyy-mm-dd

    $current =new DateTime(trim(date("Y-m-d")));
    $m = $current->format('m');
    $d = $current->format('d');
    $y = $current->format('Y');
    $l= $month-$m;

    if (checkdate($month, $day,$year) and $year=$y and (($day>$d && $month=$m) || ( ($l>0 )&& ($l<3) && ($l=3 && $day<=$d) ) )) {
        return true;
    }
    else{
        return false;
    }
}

function emailValidation($email){ // format-> (upper case, lowercase, numberics, !#$%^&*) @example.com
    $pattern = "/^[a-zA-Z\d_!#$%^&*]+@[a-zA-Z]+.[com]+$/";
    

    if(preg_match($pattern,$email)){
        return true;
    }
    else{
       
        return false;
    }

}
function mobileValidation($mobile){ // must be 8-digit number
    $pattern = "/^[\d]{8}+$/";
    

    if(preg_match($pattern,$mobile)){
        return true;
    }
    else{
       
        return false;
    }

}
function mobileRepeaChecking($mobile){
    $conn = mysqli_connect('localhost', 'root', '', 'sehs4517');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    

    $mobile= $_POST['mobile'];
    $stmt ="select* from reservation where mobile=$mobile";
    $result = mysqli_query($conn, $stmt);
    if(mysqli_num_rows($result)==0){
        return true;
    }
    else{
        return false;
    }
}

function fnameValidation($fname){ //allow spaces and alphat are alloweed
    $pattern = "/^[a-zA-Z\s]{2,20}+$/";
    

    if(preg_match($pattern,$fname)){
        return true;
    }
    else{
       
        return false;
    }

}
function lnameValidation($lname){ //only alphbat is allowed
    $pattern = "/^[a-zA-Z\s]{2,20}+$/";
    

    if(preg_match($pattern,$lname)){
        return true;
    }
    else{
       
        return false;
    }

}

//all format correct connect to database
//store
if(isset($_POST['store']) && !empty($_POST['store'])){ //have field + have value
    
   //correct format
        $_SESSION['store']= $_POST['store'];
       
}
else{ //have field + no value
    $_SESSION['storeError'] = "Store cannot be blank";
}

//model
if(isset($_POST['model']) && !empty($_POST['model'])){ //have field + have value
    
    //Correct format
        $_SESSION['model']= $_POST['model'];
    
    
}
else{ //have field + no value
    $_SESSION['modelError'] = "Model cannot be blank";
}

//fname
if(isset($_POST['fname']) && !empty($_POST['fname'])){ //have field + have value
    
    if(!(fnameValidation($_POST['fname']))){ //Wrong format
        $_SESSION['fnameError'] = "Wrong format";
    }
    else{  //Correct format
        $_SESSION['fname']= $_POST['fname'];
    }
    
}
else{ //have field + no value
    $_SESSION['fnameError'] = "First name cannot be blank";
}

//lname
if(isset($_POST['lname']) && !empty($_POST['lname'])){ //have field + have value
    
    if(!(lnameValidation($_POST['lname']))){ //Wrong format
        $_SESSION['lnameError'] = "Wrong format";
    }
    else{  //Correct format
        $_SESSION['lname']= $_POST['lname'];
    }
    
}
else{ //have field + no value
    $_SESSION['lnameError'] = "Last name cannot be blank";
}

//Date
if(isset($_POST['date']) && !empty($_POST['date'])){ //have field + have value
    
    if(!(is_date($_POST['date']) )){ //Wrong format
        $_SESSION['dateError'] = "Wrong format";
    }
    else{  //Correct format
        $_SESSION['date']= $_POST['date'];
    }
    
}
else{ //have field + no value
    $_SESSION['dateError'] = "Pick up date cannot be blank";
}

//mobile
if(isset($_POST['mobile']) && !empty($_POST['mobile'])){ //have field + have value
    
    if(!(mobileValidation($_POST['mobile']))){ //Wrong format
        $_SESSION['mobileError'] = "Wrong format";
    }
    elseif(!(mobileRepeaChecking($_POST['mobile']))){
        $_SESSION['mobileError'] = "The numbers is already used";
    }
    else{  //Correct format
        $_SESSION['mobile']= $_POST['mobile'];
    }
    
}
else{ //have field + no value
    $_SESSION['mobileError'] = "Contact number cannot be blank";
}

//email
if(isset($_POST['email']) && !empty($_POST['email'])){ //have field + have value
    
    if(!(emailValidation($_POST['email']))){ //Wrong format
        $_SESSION['emailError'] = "Wrong format";
    }
    else{  //Correct format
        $_SESSION['email']= $_POST['email'];
    }
    
}
else{ //have field + no value
    $_SESSION['emailError'] = "email cannot be blank";
}



if(!empty( $_SESSION['lname']) && !empty( $_SESSION['fname']) && !empty( $_SESSION['date']) && !empty( $_SESSION['mobile']) && !empty( $_SESSION['email']) ){ //all correct
    // mysqli (procedure) - start
    $conn = mysqli_connect('localhost', 'root', '', 'sehs4517');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "<div class='container'>";
    echo "<img src='img/tick (2).png' />";
    echo "<h2>Reserve Success</h2>";

    echo "<div class='field'>";
    echo "<p>First Name:</p>";
    echo "<p>".$_SESSION['fname']."</p>";
    echo "</div>";

    echo "<div class='field'>";
    echo "<p>Last Name:</p>";
    echo "<p>".$_SESSION['lname']."</p>";
    echo "</div>";

    echo "<div class='field'>";
    echo "<p>Store:</p>";
    echo "<p>".$_SESSION['store']."</p>";
    echo "</div>";

    echo "<div class='field'>";
    echo "<p>Model:</p>";
    echo "<p>".$_SESSION['model']."</p>";
    echo "</div>";

    echo "<div class='field'>";
    echo "<p>Contact number:</p>";
    echo "<p>".$_SESSION['mobile']."</p>";
    echo "</div>";


    echo "<div class='field'>";
    echo "<p>Email Address:</p>";
    echo "<p>".$_SESSION['email']."</p>";
    echo "</div>";

    echo "<div class='field'>";
    echo "<p>Pick Up Date:</p>";
    echo "<p>".$_SESSION['date']."</p>";
    echo "</div>";


    echo "<button type='button'><a href='index.php'>Back</a></button>";
    echo "</div>";
    
    

    $store= $_SESSION['store'];
    $model= $_SESSION['model'];
    $fname= $_SESSION['fname'];
    $lname= $_SESSION['lname'];
    $email= $_SESSION['email'];
    $mobile= $_SESSION['mobile'];
    $pickup= $_SESSION['date'];

    $stmt = "insert into reservation(store,model,fname, lname, email,mobile, pickup) 
            values('" . $store . "','". $model . "','". $fname . "','". $lname . "','". $email . "','". $mobile . "','" . $pickup . "')";
    $result = mysqli_query($conn, $stmt);

    

}
else{ // at least one wrong --> go back
    header("Location: reserve.php"); 
}




?>
</body>
</html>