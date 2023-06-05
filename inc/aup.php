<?php
    if(isset($_POST["continue"])) {
        if(empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["cpassword"])) {
            header("Location: ../admin/signup.php?MAKE SURE YOU FILL ALL FIELDS");
        } else {
            require_once("conn.php");
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $cpassword = $_POST["cpassword"];

            if(($password != $cpassword) || (strlen($password) < 8) || (strlen($cpassword) < 8)) {
                header("Location: ../admin/signup.php?MAKE SURE YOU TYPE SAME PASSWORDS AND MUST BE 8 DIGITS");
            } else {
                $hashedPassword = hash("sha256", $password);
                $hashedCPassword = hash("sha256", $cpassword);
    
                $sql = "INSERT INTO `admin`(`aemail`, `aname`, `apassword`, `acpassword`) VALUES ('$email', '$name', '$hashedPassword', '$hashedCPassword');";
                $result = $connection->query($sql)
                    or die ('Problem with query! ' . $connection->error);
    
                if ($result) {
                    header('Location: ../admin/signin.php?ALL DONE!');
                } else {
                    header("Location: ../admin/signup.php?SIGN UP FAILED! TRY AGAIN");
                }
            }
        }
    }
?>
