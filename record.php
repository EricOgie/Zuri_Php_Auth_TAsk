<?php

if(isset($_POST['submit'])){

    $jsonXtension = ".json";
    $fsDir = "userDir/";
    $redirectHome = "Location: home.php";
    $signIn = "index.html";
    

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $userEmail = $_POST['email'];
    $password = $_POST['password'];

    $userData = [
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $userEmail,
        'password' => $password
    ];

    $fileName = $fsDir.$userEmail.$jsonXtension;
    $userEncoded = json_encode($userData);

    if(file_exists($fileName)){
        
        echo"<h1>Oops :)</h1><br>
        You have Been registered Prior<br>
        <p>Would you like to signIn instead?</p> <br>
        <a href='$signIn'>Sign-In</a>" ;

    }else {

        file_put_contents($fileName, $userEncoded);
        header($redirectHome);
    }


}


?>