<?php

if(isset($_POST['submit'])){

    $redirectHome = "Location: home.php";
    $showError = "Location: prevReg.html";
    $resetPword = "resetpword.html";
    $regAcc = "reg.html";

    $jsonXtension = ".json";
    $fsDir = "files/";

    $userObject = null;

    $userEmail = $_POST['email'];
    $password = $_POST['pword'];

    
    $userFile = "files/".$userEmail.$jsonXtension;
    

   if(file_exists($userFile)){
       $userData = file($userFile);
       foreach ($userData as $value) {

        $userObject = json_decode($value);

        if($userObject->email === $userEmail && $userObject->password === $password){
            header($redirectHome);

        }else{

            echo"<h1>Oops :)</h1><br>";
            echo("Wrong email or password may have been entered<br>");
            echo("<p>Did you forget your password?</p> <br>");
            echo"<a href='$resetPword'>Reset Your Password</a><br>";
            echo("<p>Don't have an Account?</p>");
            echo("<h3>CREATE YOUR ACCOUNT WITH JUST A CLICK?</h3> <br>");
            echo"<a href='$regAcc'>Register Account</a><br>";
            
        }
           
         
        
       }
       

   }

    
}

?>