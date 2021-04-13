<?php

if(isset($_POST['submit'])){

    $redirectHome = "Location: home.php";
    

    $jsonXtension = ".json";
    $fsDir = "files/";

    $userObject = null;

    $userEmail = $_POST['email'];
    $password = $_POST['pword'];

    
    $userFile = "files/".$userEmail.$jsonXtension;
    $users_array = file($userFile);

    /*
    * Because $userFile is unique, this returns a unit array if file dir is not empty
    * hence, looping through will only produce a single file which can
    * be convert to a Json object
    */

    foreach ($users_array as $value) {
        $userObject = json_decode($value); 
        
    }
    
    if(is_null($userObject)){  // $userObject could be null if file dir is empty
        showErrorMsg();

    }else {

        if($userObject->email === $userEmail && $userObject->password === $password){
            header($redirectHome);
        }else{
            showErrorMsg();
        }
    }  
}

function showErrorMsg(){
    $resetPword = "resetpword.html";
    $regAcc = "reg.html";

    echo"<h1>Oops :)</h1><br>
    Wrong email or password may have been entered<br>
    <p>Did you forget your password?</p> <br>
    <a href='$resetPword'>Reset Your Password</a><br>
    <p>Don't have an Account?</p>
    <h3>CREATE YOUR ACCOUNT WITH JUST A CLICK?</h3> <br>
    <a href='$regAcc'>Register Account</a><br>";

}

?>