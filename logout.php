
<
         <?php

           if(isset($_POST['submit'])){

            $signIn = "signin.html";

            echo("<h1>You Logged Out!</h1><br>");
            echo("Hope you had a nice time<br><br>");
            echo"<a href='$signIn'>Sign-In</a>";

           }
     
        ?>