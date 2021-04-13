<?php

if(isset($_POST['submit'])){

    $jsonXtension = ".json";
    $fsDir = "userDir/";
    $oldUserObject = null;
    $signIn = "signin.html";
    

    $email = $_POST['email'];
    $pword =  $_POST['pword'];
    $fileName = $fsDir.$email.$jsonXtension;

    if(file_exists($fileName)){
        
        $oldUserfile = file($fileName);            // Since $fileName is unique, a unit array is resturned
        
        foreach ($oldUserfile as $value) {
            $oldUserObject = json_decode($value);  // We recreate the userDataObject so we can fetch it other components
        }

        $newUserData = [
            'first_name'=> $oldUserObject->first_name,
            'last_name'=> $oldUserObject->last_name,
            'email'=> $email,
            'password'=> $pword
        ];

        unlink($fileName);
        file_put_contents($fileName, json_encode($newUserData));

        echo"<h1>Well Done!)</h1><br>
        Your password has been updated.<br>
        <p>You may proceed to LogIn using the link below</p> <br>
        <a href='$signIn'>Sign-In</a>";

    }else{

        echo"<h1>Sorry :)</h1><br>
        No ". $email. " in our records";
    }


 }

?>