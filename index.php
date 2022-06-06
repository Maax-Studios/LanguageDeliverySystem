<?php 

    header('Content-Type: application/json; charset=utf-8');

    $servername = "host";
    $username = "username";
    $password = "password";
    $dbname = "database";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {

            die("Connection failed: " . mysqli_connect_error());

        } else {
                
            sql = "CREATE TABLE `mstudios`.`products` ( `package` VARCHAR(100) NOT NULL , `strings` JSON NOT NULL , PRIMARY KEY (`package`))";
            $result = mysqli_query($conn, $sql);
            
        }

    $error = array(
        "type" => "error",
        "msg" => "Language file not found.",
    );

    if (!$_GET['package']) {

        echo json_encode($error);

    } else {

        $package = $_GET['package'];


        $sql = "SELECT * FROM `ms_language` WHERE package = '$package'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              echo $row["strings"];
            }
        } else {
            echo json_encode($error);
        }

    }
?>
