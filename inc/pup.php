<?php
    if(isset($_POST["continue"])) {
        if(empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["cpassword"])) {
            header("Location: ../people/signup.php?MAKE SURE YOU FILL ALL FIELDS");
        } else {
            require_once("conn.php");
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $cpassword = $_POST["cpassword"];

            if(($password != $cpassword) || (strlen($password) < 8) || (strlen($cpassword) < 8)) {
                header("Location: ../people/signup.php?MAKE SURE YOU TYPE SAME PASSWORDS AND MUST BE 8 DIGITS");
            } else {
                $hashedPassword = hash("sha256", $password);
                $hashedCPassword = hash("sha256", $cpassword);
    
                $sql = "INSERT INTO `people`(`pemail`, `pname`, `ppassword`, `pcpassword`) VALUES ('$email', '$name', '$hashedPassword', '$hashedCPassword');";
                $result = $connection->query($sql)
                    or die ('Problem with query! ' . $connection->error);
    
                if ($result) {
                    header('Location: ../people/signin.php?ALL DONE!');
                } else {
                    header("Location: ../people/signup.php?SIGN UP FAILED! TRY AGAIN");
                }
            }
        }
    }
?>