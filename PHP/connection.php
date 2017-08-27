
<?php

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "dbrcdg";
    // Create connection
    $con = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($con->connect_error) {

      die("Connection failed: " . $con->connect_error); //Delete This Later: This will terminate program and show error message

    }
    else {

    }


?>
