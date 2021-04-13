<?php

if(isset($_POST['submit'])){

    $jsonXtension = ".json";
    $fsDir = "files/";
    

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
    redirectToSuccess($fileName, $userData);

}

function redirectToSuccess($fileName, $userData){
    $redirectHome = "Location: home.php";
    $signIn = "signin.html";

    if(file_exists($fileName)){
        
        echo"<h1>Oops :)</h1><br>";
            echo("You have Been registered Prior<br>");
            echo("<p>Would you like to signIn instead?</p> <br>");
            echo"<a href='$signIn'>Sign-In</a>";
    }else{
        file_put_contents($fileName, json_encode($userData));
        header($redirectHome);
    }

}

?>